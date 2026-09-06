(function () {
  "use strict";

  function initHistoryRings() {
    var container = document.querySelector(".historyRingsContainer");
    if (!container) return;

    var activeRing = container.querySelector(".historyActiveRing");
    var pulse = container.querySelector(".historyPulse");
    var bodies = container.querySelectorAll(".historyRingBody");
    var controls = container.querySelectorAll("[data-history-id]");
    var cards = container.querySelectorAll("[data-history-card]");

    function pulseRing(radius) {
      var start;
      function frame(time) {
        if (!start) start = time;
        var progress = Math.min((time - start) / 800, 1);
        pulse.setAttribute("r", radius + progress * 20);
        pulse.setAttribute("opacity", 0.5 * (1 - progress));
        if (progress < 1) window.requestAnimationFrame(frame);
      }
      window.requestAnimationFrame(frame);
    }

    function activate(id, animate) {
      var selectedBody = container.querySelector('.historyRingBody[data-history-id="' + id + '"]');
      if (!selectedBody) return;
      var radius = Number(selectedBody.getAttribute("r"));
      activeRing.setAttribute("r", radius);

      Array.prototype.forEach.call(bodies, function (body) {
        var selected = body.getAttribute("data-history-id") === id;
        body.style.stroke = selected ? "#A86A52" : "#4A6450";
        body.style.opacity = selected ? "0.7" : body.getAttribute("opacity") || "1";
      });
      Array.prototype.forEach.call(container.querySelectorAll(".historyTimelineItem"), function (item) {
        var selected = item.getAttribute("data-history-id") === id;
        item.classList.toggle("is-active", selected);
        item.setAttribute("aria-selected", selected ? "true" : "false");
      });
      Array.prototype.forEach.call(cards, function (card) {
        var selected = card.getAttribute("data-history-card") === id;
        card.hidden = !selected;
        card.classList.toggle("is-active", selected);
      });
      if (animate) pulseRing(radius);
    }

    Array.prototype.forEach.call(controls, function (control) {
      control.addEventListener("click", function () {
        activate(control.getAttribute("data-history-id"), true);
      });
    });
    activate("2005", false);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initHistoryRings);
  } else {
    initHistoryRings();
  }
})();
