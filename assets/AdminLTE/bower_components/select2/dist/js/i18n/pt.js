/*! Select2 4.0.5 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var e = jQuery.fn.select2.amd;
  return (
    e.define("select2/i18n/pt", [], function () {
      return {
        errorLoading: function () {
          return "Os resultados não puderam ser carregados.";
        },
        inputTooLong: function (e) {
          var t = e.input.length - e.maximum,
            n = "Por favor apague " + t + " ";
          return (n += t != 1 ? "caracteres" : "caractere"), n;
        },
        inputTooShort: function (e) {
          var t = e.minimum - e.input.length,
            n = "Introduza " + t + " ou mais caracteres";
          return n;
        },
        loadingMore: function () {
          return "A carregar mais resultados…";
        },
        maximumSelected: function (e) {
          var t = "Apenas pode seleccionar " + e.maximum + " ";
          return (t += e.maximum != 1 ? "itens" : "item"), t;
        },
        noResults: function () {
          return "Sem resultados";
        },
        searching: function () {
          return "A procurar…";
        },
      };
    }),
    { define: e.define, require: e.require }
  );
})();
