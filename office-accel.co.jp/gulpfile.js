// Pug/Sass/Gulp構成を維持。各タスクの実行はユーザーが手動で行う。
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const pug = require("gulp-pug");
const beautify = require("gulp-beautify");
const browserSync = require("browser-sync");
const fs = require("fs");
const path = require("path");
const { Transform } = require("stream");

function html() {
  return gulp.src("./src/pug/pages/**/*.pug")
    .pipe(pug({ pretty: true, basedir: path.join(__dirname, "src/pug") }))
    .pipe(beautify.html({ indent_size: 4, indent_with_tabs: true }))
    .pipe(gulp.dest("./public"));
}
function css() {
  return gulp.src("./src/sass/*.scss")
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(gulp.dest("./public/css"));
}
function reload(done) { browserSync.reload(); done(); }
function serve(done) { browserSync.init({ server: { baseDir: "./public", index: "index.html" } }); done(); }
function watch() {
  gulp.watch("./src/pug/**/*.pug", gulp.series("pug", reload));
  gulp.watch("./src/sass/**/*.scss", gulp.series("css", reload));
  gulp.watch(["./public/js/**/*.js", "./public/image/**/*", "./public/css/attach.css"], reload);
}
function readMigration() {
  const configPath = path.join(__dirname, "cms/migration.json");
  const config = fs.existsSync(configPath)
    ? JSON.parse(fs.readFileSync(configPath, "utf8"))
    : { containerTag: "div" };
  config.containerTag = config.containerTag || "div";
  if (!["div", "section"].includes(config.containerTag)) throw new Error("containerTagはdivまたはsectionにしてください。");
  return config;
}
function cms() {
  const migration = readMigration();
  const settings = JSON.parse(fs.readFileSync(path.join(__dirname, "cms/settings.json"), "utf8"));
  const keys = ["instagram"];
  const snippets = {};
  let firstFile;
  const collect = new Transform({
    objectMode: true,
    transform(file, encoding, callback) {
      const key = path.basename(file.path, ".html");
      const text = file.contents.toString("utf8");
      if (!keys.includes(key) || !settings[key]) return callback(new Error("未定義のCMSブロック：" + key));
      if ((text.match(/class="webgene-item"/g) || []).length !== 1 || /\{\{|未設定/.test(text)) return callback(new Error("CMSブロックの繰り返し元または未設定値を確認：" + key));
      if (!firstFile) firstFile = file;
      snippets[key] = text;
      this.push(file);
      callback();
    },
    flush(callback) {
      if (keys.some(key => !snippets[key])) return callback(new Error("CMSブロックが不足しています。"));
      const combined = firstFile.clone();
      combined.path = path.join(firstFile.base, "data-block.html");
      combined.contents = Buffer.from(keys.map(key => "<!-- " + settings[key].label + " / " + key + " -->\n" + snippets[key]).join("\n\n"));
      this.push(combined);
      const notes = firstFile.clone();
      notes.path = path.join(firstFile.base, "cms-settings.json");
      notes.contents = Buffer.from(JSON.stringify({ migration, blocks: settings }, null, 2) + "\n");
      this.push(notes);
      callback();
    }
  });
  return gulp.src("./src/pug/cms/*.pug")
    .pipe(pug({ pretty: true, basedir: path.join(__dirname, "src/pug"), locals: { cmsMode: true, migration } }))
    .pipe(beautify.html({ indent_size: 4, indent_with_tabs: true }))
    .pipe(collect)
    .pipe(gulp.dest("./cms/generated"));
}
gulp.task("pug", html);
gulp.task("css", css);
gulp.task("cms", cms);
gulp.task("reload", reload);
gulp.task("browser-sync", serve);
gulp.task("watch", watch);
gulp.task("build", gulp.parallel("pug", "css"));
// 初回ビルドを含める。空のpublicで開発サーバーを開始しない。
gulp.task("default", gulp.series("build", "browser-sync", "watch"));
