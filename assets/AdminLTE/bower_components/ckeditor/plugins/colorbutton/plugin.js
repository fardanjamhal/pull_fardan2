﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.plugins.add("colorbutton", {
  requires: "panelbutton,floatpanel",
  lang: "af,ar,az,bg,bn,bs,ca,cs,cy,da,de,de-ch,el,en,en-au,en-ca,en-gb,eo,es,es-mx,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,oc,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn",
  icons: "bgcolor,textcolor",
  hidpi: !0,
  init: function (d) {
    function t(a, e, g, r, l) {
      var n = new CKEDITOR.style(k["colorButton_" + e + "Style"]),
        m = CKEDITOR.tools.getNextId() + "_colorBox",
        p;
      l = l || {};
      d.ui.add(a, CKEDITOR.UI_PANELBUTTON, {
        label: g,
        title: g,
        modes: { wysiwyg: 1 },
        editorFocus: 0,
        toolbar: "colors," + r,
        allowedContent: n,
        requiredContent: n,
        contentTransformations: l.contentTransformations,
        panel: {
          css: CKEDITOR.skin.getPath("editor"),
          attributes: { role: "listbox", "aria-label": h.panelTitle },
        },
        onBlock: function (a, b) {
          p = b;
          b.autoSize = !0;
          b.element.addClass("cke_colorblock");
          b.element.setHtml(y(a, e, m));
          b.element.getDocument().getBody().setStyle("overflow", "hidden");
          CKEDITOR.ui.fire("ready", this);
          var c = b.keys,
            f = "rtl" == d.lang.dir;
          c[f ? 37 : 39] = "next";
          c[40] = "next";
          c[9] = "next";
          c[f ? 39 : 37] = "prev";
          c[38] = "prev";
          c[CKEDITOR.SHIFT + 9] = "prev";
          c[32] = "click";
        },
        refresh: function () {
          d.activeFilter.check(n) || this.setState(CKEDITOR.TRISTATE_DISABLED);
        },
        onOpen: function () {
          var a = d.getSelection(),
            b = a && a.getStartElement(),
            c = d.elementPath(b);
          if (c) {
            b = c.block || c.blockLimit || d.document.getBody();
            do
              c =
                (b &&
                  b.getComputedStyle(
                    "back" == e ? "background-color" : "color",
                  )) ||
                "transparent";
            while (
              "back" == e &&
              "transparent" == c &&
              b &&
              (b = b.getParent())
            );
            (c && "transparent" != c) || (c = "#ffffff");
            !1 !== k.colorButton_enableAutomatic &&
              this._.panel._.iframe
                .getFrameDocument()
                .getById(m)
                .setStyle("background-color", c);
            if ((b = a && a.getRanges()[0])) {
              for (
                var a = new CKEDITOR.dom.walker(b),
                  f = b.collapsed ? b.startContainer : a.next(),
                  b = "";
                f;

              ) {
                f.type === CKEDITOR.NODE_TEXT && (f = f.getParent());
                f = u(
                  f.getComputedStyle(
                    "back" == e ? "background-color" : "color",
                  ),
                );
                b = b || f;
                if (b !== f) {
                  b = "";
                  break;
                }
                f = a.next();
              }
              a = b;
              b = p._.getItems();
              for (f = 0; f < b.count(); f++) {
                var g = b.getItem(f);
                g.removeAttribute("aria-selected");
                a &&
                  a == u(g.getAttribute("data-value")) &&
                  g.setAttribute("aria-selected", !0);
              }
            }
            return c;
          }
        },
      });
    }
    function y(a, e, g) {
      a = [];
      var r = k.colorButton_colors.split(","),
        l = k.colorButton_colorsPerRow || 6,
        n = d.plugins.colordialog && !1 !== k.colorButton_enableMore,
        m = r.length + (n ? 2 : 1),
        p = CKEDITOR.tools.addFunction(function (a, b) {
          function c(a) {
            d.removeStyle(
              new CKEDITOR.style(k["colorButton_" + b + "Style"], {
                color: "inherit",
              }),
            );
            var e = k["colorButton_" + b + "Style"];
            e.childRule =
              "back" == b
                ? function (a) {
                    return v(a);
                  }
                : function (a) {
                    return (
                      !(a.is("a") || a.getElementsByTag("a").count()) || v(a)
                    );
                  };
            d.focus();
            d.applyStyle(new CKEDITOR.style(e, { color: a }));
            d.fire("saveSnapshot");
          }
          d.focus();
          d.fire("saveSnapshot");
          if ("?" == a)
            d.getColorFromDialog(function (a) {
              if (a) return c(a);
            });
          else return c(a);
        });
      !1 !== k.colorButton_enableAutomatic &&
        a.push(
          '\x3ca class\x3d"cke_colorauto" _cke_focus\x3d1 hidefocus\x3dtrue title\x3d"',
          h.auto,
          '" onclick\x3d"CKEDITOR.tools.callFunction(',
          p,
          ",null,'",
          e,
          "');return false;\" href\x3d\"javascript:void('",
          h.auto,
          '\')" role\x3d"option" aria-posinset\x3d"1" aria-setsize\x3d"',
          m,
          '"\x3e\x3ctable role\x3d"presentation" cellspacing\x3d0 cellpadding\x3d0 width\x3d"100%"\x3e\x3ctr\x3e\x3ctd colspan\x3d"' +
            l +
            '" align\x3d"center"\x3e\x3cspan class\x3d"cke_colorbox" id\x3d"',
          g,
          '"\x3e\x3c/span\x3e',
          h.auto,
          "\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\x3c/a\x3e",
        );
      a.push(
        '\x3ctable role\x3d"presentation" cellspacing\x3d0 cellpadding\x3d0 width\x3d"100%"\x3e',
      );
      for (g = 0; g < r.length; g++) {
        0 === g % l && a.push("\x3c/tr\x3e\x3ctr\x3e");
        var q = r[g].split("/"),
          b = q[0],
          c = q[1] || b;
        q[1] || (b = "#" + b.replace(/^(.)(.)(.)$/, "$1$1$2$2$3$3"));
        q = d.lang.colorbutton.colors[c] || c;
        a.push(
          '\x3ctd\x3e\x3ca class\x3d"cke_colorbox" _cke_focus\x3d1 hidefocus\x3dtrue title\x3d"',
          q,
          '" onclick\x3d"CKEDITOR.tools.callFunction(',
          p,
          ",'",
          b,
          "','",
          e,
          "'); return false;\" href\x3d\"javascript:void('",
          q,
          '\')" data-value\x3d"' + c + '" role\x3d"option" aria-posinset\x3d"',
          g + 2,
          '" aria-setsize\x3d"',
          m,
          '"\x3e\x3cspan class\x3d"cke_colorbox" style\x3d"background-color:#',
          c,
          '"\x3e\x3c/span\x3e\x3c/a\x3e\x3c/td\x3e',
        );
      }
      n &&
        a.push(
          '\x3c/tr\x3e\x3ctr\x3e\x3ctd colspan\x3d"' +
            l +
            '" align\x3d"center"\x3e\x3ca class\x3d"cke_colormore" _cke_focus\x3d1 hidefocus\x3dtrue title\x3d"',
          h.more,
          '" onclick\x3d"CKEDITOR.tools.callFunction(',
          p,
          ",'?','",
          e,
          "');return false;\" href\x3d\"javascript:void('",
          h.more,
          "')\"",
          ' role\x3d"option" aria-posinset\x3d"',
          m,
          '" aria-setsize\x3d"',
          m,
          '"\x3e',
          h.more,
          "\x3c/a\x3e\x3c/td\x3e",
        );
      a.push("\x3c/tr\x3e\x3c/table\x3e");
      return a.join("");
    }
    function v(a) {
      return (
        "false" == a.getAttribute("contentEditable") ||
        a.getAttribute("data-nostyle")
      );
    }
    function u(a) {
      return CKEDITOR.tools
        .normalizeHex("#" + CKEDITOR.tools.convertRgbToHex(a || ""))
        .replace(/#/g, "");
    }
    var k = d.config,
      h = d.lang.colorbutton;
    if (!CKEDITOR.env.hc) {
      t("TextColor", "fore", h.textColorTitle, 10, {
        contentTransformations: [
          [
            {
              element: "font",
              check: "span{color}",
              left: function (a) {
                return !!a.attributes.color;
              },
              right: function (a) {
                a.name = "span";
                a.attributes.color && (a.styles.color = a.attributes.color);
                delete a.attributes.color;
              },
            },
          ],
        ],
      });
      var w = {},
        x = d.config.colorButton_normalizeBackground;
      if (void 0 === x || x)
        w.contentTransformations = [
          [
            {
              element: "span",
              left: function (a) {
                var d = CKEDITOR.tools;
                if ("span" != a.name || !a.styles || !a.styles.background)
                  return !1;
                a = d.style.parse.background(a.styles.background);
                return a.color && 1 === d.objectKeys(a).length;
              },
              right: function (a) {
                var e = new CKEDITOR.style(d.config.colorButton_backStyle, {
                  color: a.styles.background,
                }).getDefinition();
                a.name = e.element;
                a.styles = e.styles;
                a.attributes = e.attributes || {};
                return a;
              },
            },
          ],
        ];
      t("BGColor", "back", h.bgColorTitle, 20, w);
    }
  },
});
CKEDITOR.config.colorButton_colors =
  "1ABC9C,2ECC71,3498DB,9B59B6,4E5F70,F1C40F,16A085,27AE60,2980B9,8E44AD,2C3E50,F39C12,E67E22,E74C3C,ECF0F1,95A5A6,DDD,FFF,D35400,C0392B,BDC3C7,7F8C8D,999,000";
CKEDITOR.config.colorButton_foreStyle = {
  element: "span",
  styles: { color: "#(color)" },
  overrides: [{ element: "font", attributes: { color: null } }],
};
CKEDITOR.config.colorButton_backStyle = {
  element: "span",
  styles: { "background-color": "#(color)" },
};
