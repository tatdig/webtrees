/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

import $ from "jquery";
window.$ = window.jQuery = $;

import "popper.js";
import "bootstrap";
import "datatables.net";

window.Bloodhound = require("corejs-typeahead/dist/bloodhound.min.js");
import "corejs-typeahead";

import "datatables.net-bs4";

// See https://github.com/RubaXa/Sortable/issues/1229
window.Sortable = require('sortablejs');

import "select2";
//import "select2/dist/js/i18n/*.js";

import "select2/dist/js/i18n/af.js";
import "select2/dist/js/i18n/ar.js";
import "select2/dist/js/i18n/az.js";
import "select2/dist/js/i18n/bg.js";
import "select2/dist/js/i18n/bn.js";
import "select2/dist/js/i18n/bs.js";
import "select2/dist/js/i18n/ca.js";
import "select2/dist/js/i18n/cs.js";
import "select2/dist/js/i18n/da.js";
import "select2/dist/js/i18n/de.js";
import "select2/dist/js/i18n/dsb.js";
import "select2/dist/js/i18n/el.js";
import "select2/dist/js/i18n/en.js";
import "select2/dist/js/i18n/es.js";
import "select2/dist/js/i18n/et.js";
import "select2/dist/js/i18n/eu.js";
import "select2/dist/js/i18n/fa.js";
import "select2/dist/js/i18n/fi.js";
import "select2/dist/js/i18n/fr.js";
import "select2/dist/js/i18n/gl.js";
import "select2/dist/js/i18n/he.js";
import "select2/dist/js/i18n/hi.js";
import "select2/dist/js/i18n/hr.js";
import "select2/dist/js/i18n/hsb.js";
import "select2/dist/js/i18n/hu.js";
import "select2/dist/js/i18n/hy.js";
import "select2/dist/js/i18n/id.js";
import "select2/dist/js/i18n/is.js";
import "select2/dist/js/i18n/it.js";
import "select2/dist/js/i18n/ja.js";
import "select2/dist/js/i18n/ka.js";
import "select2/dist/js/i18n/km.js";
import "select2/dist/js/i18n/ko.js";
import "select2/dist/js/i18n/lt.js";
import "select2/dist/js/i18n/lv.js";
import "select2/dist/js/i18n/mk.js";
import "select2/dist/js/i18n/ms.js";
import "select2/dist/js/i18n/nb.js";
import "select2/dist/js/i18n/ne.js";
import "select2/dist/js/i18n/nl.js";
import "select2/dist/js/i18n/pl.js";
import "select2/dist/js/i18n/ps.js";
import "select2/dist/js/i18n/pt-BR.js";
import "select2/dist/js/i18n/pt.js";
import "select2/dist/js/i18n/ro.js";
import "select2/dist/js/i18n/ru.js";
import "select2/dist/js/i18n/sk.js";
import "select2/dist/js/i18n/sl.js";
import "select2/dist/js/i18n/sq.js";
import "select2/dist/js/i18n/sr-Cyrl.js";
import "select2/dist/js/i18n/sr.js";
import "select2/dist/js/i18n/sv.js";
import "select2/dist/js/i18n/th.js";
import "select2/dist/js/i18n/tk.js";
import "select2/dist/js/i18n/tr.js";
import "select2/dist/js/i18n/uk.js";
import "select2/dist/js/i18n/vi.js";
import "select2/dist/js/i18n/zh-CN.js";
import "select2/dist/js/i18n/zh-TW.js";

import "hideshowpassword";

import "moment";

import "jquery-colorbox";

import "wheelzoom";

import "leaflet";
import "leaflet-providers";
window.GeoSearch = require("leaflet-geosearch");
import "leaflet.markercluster";
import "beautifymarker";
