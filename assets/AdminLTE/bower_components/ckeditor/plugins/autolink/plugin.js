﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  var g = /^(https?|ftp):\/\/(-\.)?([^\s\/?\.#]+\.?)+(\/[^\s]*)?[^\s\.,]$/gi,
    e =
      /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/g,
    f = /"/g;
  CKEDITOR.plugins.add("autolink", {
    requires: "clipboard",
    init: function (c) {
      c.on("paste", function (d) {
        var a = d.data.dataValue;
        if (
          d.data.dataTransfer.getTransferType(c) !=
            CKEDITOR.DATA_TRANSFER_INTERNAL &&
          !(-1 < a.indexOf("\x3c"))
        ) {
          if (a.match(e)) {
            if (
              ((a = a.replace(
                e,
                '\x3ca href\x3d"mailto:' +
                  a.replace(f, "%22") +
                  '"\x3e$\x26\x3c/a\x3e',
              )),
              c.plugins.link)
            ) {
              var a = CKEDITOR.dom.element.createFromHtml(a),
                b = CKEDITOR.plugins.link.parseLinkAttributes(c, a),
                b = CKEDITOR.plugins.link.getLinkAttributes(c, b);
              CKEDITOR.tools.isEmpty(b.set) || a.setAttributes(b.set);
              b.removed.length && a.removeAttributes(b.removed);
              a = a.getOuterHtml();
            }
          } else
            a = a.replace(
              g,
              '\x3ca href\x3d"' + a.replace(f, "%22") + '"\x3e$\x26\x3c/a\x3e',
            );
          a != d.data.dataValue && (d.data.type = "html");
          d.data.dataValue = a;
        }
      });
    },
  });
})();
