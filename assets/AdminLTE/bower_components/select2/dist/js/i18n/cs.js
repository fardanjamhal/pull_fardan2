/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/cs", [], function () {
      function e(e, t) {
        switch (e) {
          case 2:
            return t ? "dva" : "dvě";
          case 3:
            return "tři";
          case 4:
            return "čtyři";
        }
        return "";
      }
      return {
        errorLoading: function () {
          return "Výsledky nemohly být načteny.";
        },
        inputTooLong: function (t) {
          var n = t.input.length - t.maximum;
          return n == 1
            ? "Prosím, zadejte o jeden znak méně."
            : n <= 4
              ? "Prosím, zadejte o " + e(n, !0) + " znaky méně."
              : "Prosím, zadejte o " + n + " znaků méně.";
        },
        inputTooShort: function (t) {
          var n = t.minimum - t.input.length;
          return n == 1
            ? "Prosím, zadejte ještě jeden znak."
            : n <= 4
              ? "Prosím, zadejte ještě další " + e(n, !0) + " znaky."
              : "Prosím, zadejte ještě dalších " + n + " znaků.";
        },
        loadingMore: function () {
          return "Načítají se další výsledky…";
        },
        maximumSelected: function (t) {
          var n = t.maximum;
          return n == 1
            ? "Můžete zvolit jen jednu položku."
            : n <= 4
              ? "Můžete zvolit maximálně " + e(n, !1) + " položky."
              : "Můžete zvolit maximálně " + n + " položek.";
        },
        noResults: function () {
          return "Nenalezeny žádné položky.";
        },
        searching: function () {
          return "Vyhledávání…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
