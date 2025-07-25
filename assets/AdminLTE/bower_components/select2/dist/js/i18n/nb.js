/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/nb", [], function () {
      return {
        errorLoading: function () {
          return "Kunne ikke hente resultater.";
        },
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum;
          return "Vennligst fjern " + t + " tegn";
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "Vennligst skriv inn " + t + " tegn til";
          return n + " tegn til";
        },
        loadingMore: function () {
          return "Laster flere resultater…";
        },
        maximumSelected: function (e) {
          return "Du kan velge maks " + e.maximum + " elementer";
        },
        noResults: function () {
          return "Ingen treff";
        },
        searching: function () {
          return "Søker…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
