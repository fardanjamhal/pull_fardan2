﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  CKEDITOR.plugins.add("div", {
    requires: "dialog",
    lang: "af,ar,az,bg,bn,bs,ca,cs,cy,da,de,de-ch,el,en,en-au,en-ca,en-gb,eo,es,es-mx,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,oc,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn",
    icons: "creatediv",
    hidpi: !0,
    init: function (a) {
      if (!a.blockless) {
        var c = a.lang.div,
          b = "div(*)";
        CKEDITOR.dialog.isTabEnabled(a, "editdiv", "advanced") &&
          (b += ";div[dir,id,lang,title]{*}");
        a.addCommand(
          "creatediv",
          new CKEDITOR.dialogCommand("creatediv", {
            allowedContent: b,
            requiredContent: "div",
            contextSensitive: !0,
            contentTransformations: [["div: alignmentToStyle"]],
            refresh: function (a, c) {
              this.setState(
                "div" in
                  (a.config.div_wrapTable ? c.root : c.blockLimit).getDtd()
                  ? CKEDITOR.TRISTATE_OFF
                  : CKEDITOR.TRISTATE_DISABLED,
              );
            },
          }),
        );
        a.addCommand(
          "editdiv",
          new CKEDITOR.dialogCommand("editdiv", { requiredContent: "div" }),
        );
        a.addCommand("removediv", {
          requiredContent: "div",
          exec: function (a) {
            function c(b) {
              (b = CKEDITOR.plugins.div.getSurroundDiv(a, b)) &&
                !b.data("cke-div-added") &&
                (f.push(b), b.data("cke-div-added"));
            }
            for (
              var b = a.getSelection(),
                g = b && b.getRanges(),
                e,
                h = b.createBookmarks(),
                f = [],
                d = 0;
              d < g.length;
              d++
            )
              (e = g[d]),
                e.collapsed
                  ? c(b.getStartElement())
                  : ((e = new CKEDITOR.dom.walker(e)),
                    (e.evaluator = c),
                    e.lastForward());
            for (d = 0; d < f.length; d++) f[d].remove(!0);
            b.selectBookmarks(h);
          },
        });
        a.ui.addButton &&
          a.ui.addButton("CreateDiv", {
            label: c.toolbar,
            command: "creatediv",
            toolbar: "blocks,50",
          });
        a.addMenuItems &&
          (a.addMenuItems({
            editdiv: {
              label: c.edit,
              command: "editdiv",
              group: "div",
              order: 1,
            },
            removediv: {
              label: c.remove,
              command: "removediv",
              group: "div",
              order: 5,
            },
          }),
          a.contextMenu &&
            a.contextMenu.addListener(function (b) {
              return !b || b.isReadOnly()
                ? null
                : CKEDITOR.plugins.div.getSurroundDiv(a)
                  ? {
                      editdiv: CKEDITOR.TRISTATE_OFF,
                      removediv: CKEDITOR.TRISTATE_OFF,
                    }
                  : null;
            }));
        CKEDITOR.dialog.add("creatediv", this.path + "dialogs/div.js");
        CKEDITOR.dialog.add("editdiv", this.path + "dialogs/div.js");
      }
    },
  });
  CKEDITOR.plugins.div = {
    getSurroundDiv: function (a, c) {
      var b = a.elementPath(c);
      return a.elementPath(b.blockLimit).contains(function (a) {
        return a.is("div") && !a.isReadOnly();
      }, 1);
    },
  };
})();
