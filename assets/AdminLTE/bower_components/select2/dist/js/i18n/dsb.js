/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/dsb", [], function () {
      var e = ["znamuško", "znamušce", "znamuška", "znamuškow"],
        t = ["zapisk", "zapiska", "zapiski", "zapiskow"],
        n = function (t, n) {
          if (t === 1) return n[0];
          if (t === 2) return n[1];
          if (t > 2 && t <= 4) return n[2];
          if (t >= 5) return n[3];
        };
      return {
        errorLoading: function () {
          return "Wuslědki njejsu se dali zacytaś.";
        },
        inputTooLong: function (t) {
          var r = t.input.length - t.maximum;
          return "Pšosym lašuj " + r + " " + n(r, e);
        },
        inputTooShort: function (t) {
          var r = t.minimum - t.input.length;
          return "Pšosym zapódaj nanejmjenjej " + r + " " + n(r, e);
        },
        loadingMore: function () {
          return "Dalšne wuslědki se zacytaju…";
        },
        maximumSelected: function (e) {
          return "Móžoš jano " + e.maximum + " " + n(e.maximum, t) + "wubraś.";
        },
        noResults: function () {
          return "Žedne wuslědki namakane";
        },
        searching: function () {
          return "Pyta se…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
