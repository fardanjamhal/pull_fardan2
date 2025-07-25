﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function () {
  function p(b, f, e, d, r, p, v, x) {
    var y = b.config,
      t = new CKEDITOR.style(v),
      g = r.split(";");
    r = [];
    for (var k = {}, l = 0; l < g.length; l++) {
      var m = g[l];
      if (m) {
        var m = m.split("/"),
          w = {},
          q = (g[l] = m[0]);
        w[e] = r[l] = m[1] || q;
        k[q] = new CKEDITOR.style(v, w);
        k[q]._.definition.name = q;
      } else g.splice(l--, 1);
    }
    b.ui.addRichCombo(f, {
      label: d.label,
      title: d.panelTitle,
      toolbar: "styles," + x,
      defaultValue: "cke-default",
      allowedContent: t,
      requiredContent: t,
      contentTransformations: [
        [
          {
            element: "font",
            check: "span",
            left: function (a) {
              return (
                !!a.attributes.size ||
                !!a.attributes.align ||
                !!a.attributes.face
              );
            },
            right: function (a) {
              var b = " x-small small medium large x-large xx-large 48px".split(
                " ",
              );
              a.name = "span";
              a.attributes.size &&
                ((a.styles["font-size"] = b[a.attributes.size]),
                delete a.attributes.size);
              a.attributes.align &&
                ((a.styles["text-align"] = a.attributes.align),
                delete a.attributes.align);
              a.attributes.face &&
                ((a.styles["font-family"] = a.attributes.face),
                delete a.attributes.face);
            },
          },
        ],
      ],
      panel: {
        css: [CKEDITOR.skin.getPath("editor")].concat(y.contentsCss),
        multiSelect: !1,
        attributes: { "aria-label": d.panelTitle },
      },
      init: function () {
        var a;
        a = "(" + b.lang.common.optionDefault + ")";
        this.startGroup(d.panelTitle);
        this.add(this.defaultValue, a, a);
        for (var c = 0; c < g.length; c++)
          (a = g[c]), this.add(a, k[a].buildPreview(), a);
      },
      onClick: function (a) {
        b.focus();
        b.fire("saveSnapshot");
        var c = this.getValue(),
          f = k[a],
          e,
          n,
          h,
          d,
          g;
        if (c && a != c)
          if (
            ((e = k[c]), (c = b.getSelection().getRanges()[0]), c.collapsed)
          ) {
            if (
              ((n = b.elementPath()),
              (h = n.contains(function (a) {
                return e.checkElementRemovable(a);
              })))
            ) {
              d = c.checkBoundaryOfElement(h, CKEDITOR.START);
              g = c.checkBoundaryOfElement(h, CKEDITOR.END);
              if (d && g) {
                for (d = c.createBookmark(); (n = h.getFirst()); )
                  n.insertBefore(h);
                h.remove();
                c.moveToBookmark(d);
              } else
                d || g
                  ? c.moveToPosition(
                      h,
                      d
                        ? CKEDITOR.POSITION_BEFORE_START
                        : CKEDITOR.POSITION_AFTER_END,
                    )
                  : (c.splitElement(h),
                    c.moveToPosition(h, CKEDITOR.POSITION_AFTER_END)),
                  u(c, n.elements.slice(), h);
              b.getSelection().selectRanges([c]);
            }
          } else b.removeStyle(e);
        a === this.defaultValue ? e && b.removeStyle(e) : b.applyStyle(f);
        b.fire("saveSnapshot");
      },
      onRender: function () {
        b.on(
          "selectionChange",
          function (a) {
            var c = this.getValue();
            a = a.data.path.elements;
            for (var d = 0, f; d < a.length; d++) {
              f = a[d];
              for (var e in k)
                if (k[e].checkElementMatch(f, !0, b)) {
                  e != c && this.setValue(e);
                  return;
                }
            }
            this.setValue("", p);
          },
          this,
        );
      },
      refresh: function () {
        b.activeFilter.check(t) || this.setState(CKEDITOR.TRISTATE_DISABLED);
      },
    });
  }
  function u(b, f, e) {
    var d = f.pop();
    if (d) {
      if (e) return u(b, f, d.equals(e) ? null : e);
      e = d.clone();
      b.insertNode(e);
      b.moveToPosition(e, CKEDITOR.POSITION_AFTER_START);
      u(b, f);
    }
  }
  CKEDITOR.plugins.add("font", {
    requires: "richcombo",
    lang: "af,ar,az,bg,bn,bs,ca,cs,cy,da,de,de-ch,el,en,en-au,en-ca,en-gb,eo,es,es-mx,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,oc,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn",
    init: function (b) {
      var f = b.config;
      p(
        b,
        "Font",
        "family",
        b.lang.font,
        f.font_names,
        f.font_defaultLabel,
        f.font_style,
        30,
      );
      p(
        b,
        "FontSize",
        "size",
        b.lang.font.fontSize,
        f.fontSize_sizes,
        f.fontSize_defaultLabel,
        f.fontSize_style,
        40,
      );
    },
  });
})();
CKEDITOR.config.font_names =
  "Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif";
CKEDITOR.config.font_defaultLabel = "";
CKEDITOR.config.font_style = {
  element: "span",
  styles: { "font-family": "#(family)" },
  overrides: [{ element: "font", attributes: { face: null } }],
};
CKEDITOR.config.fontSize_sizes =
  "8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px";
CKEDITOR.config.fontSize_defaultLabel = "";
CKEDITOR.config.fontSize_style = {
  element: "span",
  styles: { "font-size": "#(size)" },
  overrides: [{ element: "font", attributes: { size: null } }],
};
