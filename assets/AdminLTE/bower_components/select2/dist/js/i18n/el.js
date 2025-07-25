/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/el", [], function () {
      return {
        errorLoading: function () {
          return "Τα αποτελέσματα δεν μπόρεσαν να φορτώσουν.";
        },
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "Παρακαλώ διαγράψτε " + t + " χαρακτήρ";
          return t == 1 && (n += "α"), t != 1 && (n += "ες"), n;
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "Παρακαλώ συμπληρώστε " + t + " ή περισσότερους χαρακτήρες";
          return n;
        },
        loadingMore: function () {
          return "Φόρτωση περισσότερων αποτελεσμάτων…";
        },
        maximumSelected: function (e) {
          var t = "Μπορείτε να επιλέξετε μόνο " + e.maximum + " επιλογ";
          return e.maximum == 1 && (t += "ή"), e.maximum != 1 && (t += "ές"), t;
        },
        noResults: function () {
          return "Δεν βρέθηκαν αποτελέσματα";
        },
        searching: function () {
          return "Αναζήτηση…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
