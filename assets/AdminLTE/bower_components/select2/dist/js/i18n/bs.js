/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/bs", [], function () {
      function e(e, t, n, r) {
        return e % 10 == 1 && e % 100 != 11
          ? t
          : e % 10 >= 2 && e % 10 <= 4 && (e % 100 < 12 || e % 100 > 14)
            ? n
            : r;
      }
      return {
        errorLoading: function () {
          return "Preuzimanje nije uspijelo.";
        },
        inputTooLong: function (t) {
          var n = t.input.length - t.maximum,
            r = "Obrišite " + n + " simbol";
          return (r += e(n, "", "a", "a")), r;
        },
        inputTooShort: function (t) {
          var n = t.minimum - t.input.length,
            r = "Ukucajte bar još " + n + " simbol";
          return (r += e(n, "", "a", "a")), r;
        },
        loadingMore: function () {
          return "Preuzimanje još rezultata…";
        },
        maximumSelected: function (t) {
          var n = "Možete izabrati samo " + t.maximum + " stavk";
          return (n += e(t.maximum, "u", "e", "i")), n;
        },
        noResults: function () {
          return "Ništa nije pronađeno";
        },
        searching: function () {
          return "Pretraga…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
