"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_backend_Dashboard_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/backend/Dashboard.vue?vue&type=script&lang=js":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/backend/Dashboard.vue?vue&type=script&lang=js ***!
  \******************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.esm-bundler.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      items: [{
        name: '文章管理',
        childItems: [{
          name: '文章列表',
          link: {
            name: 'articlesManage'
          }
        }, {
          name: '新增文章',
          link: {
            name: 'articlesCreate'
          }
        }, {
          name: '草稿',
          link: {
            name: 'articlesDraft'
          }
        }, {
          name: '垃圾桶',
          link: {
            name: 'articlesTrashed'
          }
        }]
      }, {
        name: '標籤管理',
        childItems: [{
          name: '標籤列表',
          link: {
            name: 'tagsManage'
          }
        }, {
          name: '新增標籤',
          link: {
            name: 'tagsCreate'
          }
        }]
      }, {
        name: '作品管理',
        childItems: [{
          name: '作品列表',
          link: {
            name: 'productsManage'
          }
        }, {
          name: '新增作品',
          link: {
            name: 'productsCreate'
          }
        }]
      }, {
        name: '訊息管理',
        childItems: [{
          name: '所有訊息',
          link: {
            name: 'messagesManage'
          }
        }]
      }, {
        name: '會員管理',
        childItems: [{
          name: '所有會員',
          link: {
            name: 'usersManage'
          }
        }]
      }, {
        name: '其他',
        childItems: [{
          name: '個人設定',
          link: {
            name: 'setting'
          }
        }]
      }]
    };
  },
  setup: function setup() {
    var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_0__.useRouter)();

    var redirect = function redirect(link) {
      router.push(link);
    };

    return {
      redirect: redirect
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/backend/Dashboard.vue?vue&type=template&id=7559814a":
/*!**********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/backend/Dashboard.vue?vue&type=template&id=7559814a ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "overflow-x-auto pb-10 w-full h-full"
};
var _hoisted_2 = {
  "class": "grid grid-cols-1 gap-5 md:grid-cols-3 xl:grid-cols-4"
};
var _hoisted_3 = {
  "class": "col-span-1"
};
var _hoisted_4 = {
  "class": "p-3 bg-white rounded-sm shadow-md"
};
var _hoisted_5 = {
  "class": "font-bold text-center text-blueGray-600"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("hr", {
  "class": "my-3 border-blueGray-200"
}, null, -1
/* HOISTED */
);

var _hoisted_7 = {
  "class": "flex flex-wrap gap-2 w-full"
};
var _hoisted_8 = ["onClick"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.items, function (item) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", _hoisted_5, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(item.name), 1
    /* TEXT */
    ), _hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(item.childItems, function (option) {
      return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", {
        onClick: function onClick($event) {
          return $setup.redirect(option.link);
        },
        "class": "px-4 py-1 w-auto text-sm rounded-sm cursor-pointer bg-blueGray-200 hover:text-indigo-500 hover:bg-blueGray-300"
      }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(option.name), 9
      /* TEXT, PROPS */
      , _hoisted_8);
    }), 256
    /* UNKEYED_FRAGMENT */
    ))])])]);
  }), 256
  /* UNKEYED_FRAGMENT */
  ))])]);
}

/***/ }),

/***/ "./resources/js/views/backend/Dashboard.vue":
/*!**************************************************!*\
  !*** ./resources/js/views/backend/Dashboard.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Dashboard_vue_vue_type_template_id_7559814a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=template&id=7559814a */ "./resources/js/views/backend/Dashboard.vue?vue&type=template&id=7559814a");
/* harmony import */ var _Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=script&lang=js */ "./resources/js/views/backend/Dashboard.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Dashboard_vue_vue_type_template_id_7559814a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/backend/Dashboard.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/backend/Dashboard.vue?vue&type=script&lang=js":
/*!**************************************************************************!*\
  !*** ./resources/js/views/backend/Dashboard.vue?vue&type=script&lang=js ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Dashboard.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/backend/Dashboard.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/backend/Dashboard.vue?vue&type=template&id=7559814a":
/*!********************************************************************************!*\
  !*** ./resources/js/views/backend/Dashboard.vue?vue&type=template&id=7559814a ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_template_id_7559814a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_template_id_7559814a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Dashboard.vue?vue&type=template&id=7559814a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/backend/Dashboard.vue?vue&type=template&id=7559814a");


/***/ })

}]);