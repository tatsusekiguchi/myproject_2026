(function () {
  var currentSearch = window.location.search;

  if (!currentSearch) {
    return;
  }

  var updatedSearch = currentSearch.replace(/([?&])wgd(?==)/g, "$1wgds");

  if (updatedSearch === currentSearch) {
    return;
  }

  window.location.replace(
    window.location.pathname + updatedSearch + window.location.hash
  );
})();
