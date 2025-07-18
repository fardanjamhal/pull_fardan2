﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  var b = !1;
  CKEDITOR.plugins.add("emoji", {
    requires: "autocomplete,textmatch,ajax",
    beforeInit: function () {
      (CKEDITOR.env.ie && 11 > CKEDITOR.env.version) ||
        b ||
        (CKEDITOR.document.appendStyleSheet(this.path + "skins/default.css"),
        (b = !0));
    },
    init: function (a) {
      CKEDITOR.ajax.load(
        CKEDITOR.getUrl(
          a.config.emoji_emojiListUrl || "plugins/emoji/emoji.json",
        ),
        function (b) {
          function f() {
            a._.emoji.autocomplete = new CKEDITOR.plugins.autocomplete(a, {
              textTestCallback: g(),
              dataCallback: h,
              itemTemplate:
                '\x3cli data-id\x3d"{id}" class\x3d"cke_emoji_suggestion_item"\x3e{symbol} {id}\x3c/li\x3e',
              outputTemplate: "{symbol}",
            });
          }
          function g() {
            return function (a) {
              return a.collapsed
                ? CKEDITOR.plugins.textMatch.match(a, k)
                : null;
            };
          }
          function k(a, b) {
            var c = a.slice(0, b).match(new RegExp(":\\S{" + l + "}\\S*$"));
            return c ? { start: c.index, end: b } : null;
          }
          function h(a, b) {
            var c = CKEDITOR.tools.array
              .filter(m, function (b) {
                return -1 !== b.id.indexOf(a.query.slice(1));
              })
              .sort(function (b, c) {
                var d = a.query.substr(1),
                  e = b.id.substr(1, d.length) === d,
                  d = c.id.substr(1, d.length) === d;
                return (e && d) || (!e && !d)
                  ? b.id === c.id
                    ? 0
                    : b.id > c.id
                      ? 1
                      : -1
                  : e
                    ? -1
                    : 1;
              });
            b(c);
          }
          if (null !== b) {
            void 0 === a._.emoji && (a._.emoji = {});
            void 0 === a._.emoji.list && (a._.emoji.list = JSON.parse(b));
            var m = a._.emoji.list,
              l =
                void 0 === a.config.emoji_minChars
                  ? 2
                  : a.config.emoji_minChars;
            if ("ready" !== a.status) a.once("instanceReady", f);
            else f();
          }
        },
      );
    },
  });
})();
