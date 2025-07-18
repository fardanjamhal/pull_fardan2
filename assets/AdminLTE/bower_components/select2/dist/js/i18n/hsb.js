/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/hsb", [], function () {
      var e = ["znamješko", "znamješce", "znamješka", "znamješkow"],
        t = ["zapisk", "zapiskaj", "zapiski", "zapiskow"],
        n = function (t, n) {
          if (t === 1) return n[0];
          if (t === 2) return n[1];
          if (t > 2 && t <= 4) return n[2];
          if (t >= 5) return n[3];
        };
      return {
        errorLoading: function () {
          return "Wuslědki njedachu so začitać.";
        },
        inputTooLong: function (t) {
          var r = t.input.length - t.maximum;
          return "Prošu zhašej " + r + " " + n(r, e);
        },
        inputTooShort: function (t) {
          var r = t.minimum - t.input.length;
          return "Prošu zapodaj znajmjeńša " + r + " " + n(r, e);
        },
        loadingMore: function () {
          return "Dalše wuslědki so začitaja…";
        },
        maximumSelected: function (e) {
          return "Móžeš jenož " + e.maximum + " " + n(e.maximum, t) + "wubrać";
        },
        noResults: function () {
          return "Žane wuslědki namakane";
        },
        searching: function () {
          return "Pyta so…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
