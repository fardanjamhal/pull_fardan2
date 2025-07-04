/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/sr-Cyrl", [], function () {
      function e(e, t, n, r) {
        return e % 10 == 1 && e % 100 != 11
          ? t
          : e % 10 >= 2 && e % 10 <= 4 && (e % 100 < 12 || e % 100 > 14)
            ? n
            : r;
      }
      return {
        errorLoading: function () {
          return "Преузимање није успело.";
        },
        inputTooLong: function (t) {
          var n = t.input.length - t.maximum,
            r = "Обришите " + n + " симбол";
          return (r += e(n, "", "а", "а")), r;
        },
        inputTooShort: function (t) {
          var n = t.minimum - t.input.length,
            r = "Укуцајте бар још " + n + " симбол";
          return (r += e(n, "", "а", "а")), r;
        },
        loadingMore: function () {
          return "Преузимање још резултата…";
        },
        maximumSelected: function (t) {
          var n = "Можете изабрати само " + t.maximum + " ставк";
          return (n += e(t.maximum, "у", "е", "и")), n;
        },
        noResults: function () {
          return "Ништа није пронађено";
        },
        searching: function () {
          return "Претрага…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
