﻿/*
 Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.skin.name = "kama";
CKEDITOR.skin.ua_editor = "ie,iequirks,ie7,ie8";
CKEDITOR.skin.ua_dialog = "ie,iequirks,ie7,ie8";
CKEDITOR.skin.chameleon = function (d, c) {
  var b,
    a = "." + d.id;
  "editor" == c
    ? (b =
        a +
        " .cke_inner," +
        a +
        " .cke_dialog_tab{background-color:$color;linear-gradient( to bottom,#fff -15px,$color 40px );}" +
        a +
        " .cke_toolgroup{linear-gradient( to bottom,#fff,$color 100px );}" +
        a +
        " .cke_combo_button{linear-gradient( to top,#fff,$color 100px );}" +
        a +
        " .cke_dialog_contents," +
        a +
        " .cke_dialog_footer{background-color:$color !important;}" +
        a +
        " .cke_dialog_tab:hover," +
        a +
        " .cke_dialog_tab:active," +
        a +
        " .cke_dialog_tab:focus," +
        a +
        " .cke_dialog_tab_selected{background-color:$color;background-image:none;}")
    : "panel" == c &&
      (b =
        ".cke_menubutton_icon{background-color:$color !important;border-color:$color !important;}.cke_menubutton:hover .cke_menubutton_icon,.cke_menubutton:focus .cke_menubutton_icon,.cke_menubutton:active .cke_menubutton_icon{background-color:$color !important;border-color:$color !important;}.cke_menubutton:hover .cke_menubutton_label,.cke_menubutton:focus .cke_menubutton_label,.cke_menubutton:active .cke_menubutton_label{background-color:$color !important;}.cke_menubutton_disabled:hover .cke_menubutton_label,.cke_menubutton_disabled:focus .cke_menubutton_label,.cke_menubutton_disabled:active .cke_menubutton_label{background-color: transparent !important;}.cke_menubutton_disabled:hover .cke_menubutton_icon,.cke_menubutton_disabled:focus .cke_menubutton_icon,.cke_menubutton_disabled:active .cke_menubutton_icon{background-color:$color !important;border-color:$color !important;}.cke_menubutton_disabled .cke_menubutton_icon{background-color:$color !important;border-color:$color !important;}.cke_menuseparator{background-color:$color !important;}.cke_menubutton:hover,.cke_menubutton:focus,.cke_menubutton:active{background-color:$color !important;}");
  return b;
};
