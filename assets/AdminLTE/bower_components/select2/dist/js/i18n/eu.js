/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/eu", [], function () {
      return {
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "Idatzi ";
          return (
            t == 1 ? (n += "karaktere bat") : (n += t + " karaktere"),
            (n += " gutxiago"),
            n
          );
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "Idatzi ";
          return (
            t == 1 ? (n += "karaktere bat") : (n += t + " karaktere"),
            (n += " gehiago"),
            n
          );
        },
        loadingMore: function () {
          return "Emaitza gehiago kargatzen…";
        },
        maximumSelected: function (e) {
          return e.maximum === 1
            ? "Elementu bakarra hauta dezakezu"
            : e.maximum + " elementu hauta ditzakezu soilik";
        },
        noResults: function () {
          return "Ez da bat datorrenik aurkitu";
        },
        searching: function () {
          return "Bilatzen…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
