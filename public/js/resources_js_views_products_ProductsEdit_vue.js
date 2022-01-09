"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_products_ProductsEdit_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseButton.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseButton.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseInputText.vue?vue&type=script&lang=js":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseInputText.vue?vue&type=script&lang=js ***!
  \*************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    value: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    placeholder: {
      type: String,
      required: true
    },
    type: {
      type: String,
      "default": 'text'
    }
  },
  emits: ["update:value"],
  setup: function setup(props, _ref) {
    var emit = _ref.emit;
    var text = (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)({
      get: function get() {
        return props.value;
      },
      set: function set(val) {
        return emit("update:value", val);
      }
    });
    return {
      text: text
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseLabel.vue?vue&type=script&lang=js":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseLabel.vue?vue&type=script&lang=js ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    htmlFor: {
      type: String
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/products/ProductsEdit.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/products/ProductsEdit.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.esm-bundler.js");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm-bundler.js");
/* harmony import */ var _api_product__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../api/product */ "./resources/js/api/product.js");
/* harmony import */ var _api_utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../api/utils */ "./resources/js/api/utils.js");
/* harmony import */ var _components_BaseButton__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/BaseButton */ "./resources/js/views/components/BaseButton.vue");
/* harmony import */ var _components_BaseLabel__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../components/BaseLabel */ "./resources/js/views/components/BaseLabel.vue");
/* harmony import */ var _components_BaseInputText__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../components/BaseInputText */ "./resources/js/views/components/BaseInputText.vue");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }









/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    BaseInputText: _components_BaseInputText__WEBPACK_IMPORTED_MODULE_6__["default"],
    BaseLabel: _components_BaseLabel__WEBPACK_IMPORTED_MODULE_5__["default"],
    BaseButton: _components_BaseButton__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  setup: function setup() {
    var product = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({
      name: '',
      excerpt: '',
      thumbnail: null
    });
    var thumbnailSrc = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(null);
    var isShow = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(false);
    var route = (0,vue_router__WEBPACK_IMPORTED_MODULE_7__.useRoute)();
    var id = route.params.id;
    (0,vue__WEBPACK_IMPORTED_MODULE_1__.onBeforeMount)( /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return (0,_api_product__WEBPACK_IMPORTED_MODULE_2__.apiGetProduct)(id).then(function (res) {
                product.value = res.data;
                thumbnailSrc.value = product.value.thumbnail;
                product.value.thumbnail = null;
                isShow.value = true;
              });

            case 2:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })));

    var getThumbnail = function getThumbnail(event) {
      var reader = new FileReader();

      reader.onloadend = function () {
        thumbnailSrc.value = reader.result;
      };

      reader.readAsDataURL(event.target.files[0]);
      product.value.thumbnail = event.target.files[0];
    };

    var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_7__.useRouter)();
    var store = (0,vuex__WEBPACK_IMPORTED_MODULE_8__.useStore)();

    var updateProduct = /*#__PURE__*/function () {
      var _ref2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return (0,_api_product__WEBPACK_IMPORTED_MODULE_2__.apiUpdateProduct)(id, (0,_api_utils__WEBPACK_IMPORTED_MODULE_3__.transformToFormData)(product.value)).then(function () {
                  store.dispatch('addNotice', {
                    message: '作品更新成功!',
                    color: true
                  });
                  router.push({
                    name: 'productsManage'
                  });
                });

              case 2:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }));

      return function updateProduct() {
        return _ref2.apply(this, arguments);
      };
    }();

    return {
      product: product,
      thumbnailSrc: thumbnailSrc,
      isShow: isShow,
      updateProduct: updateProduct,
      getThumbnail: getThumbnail
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseButton.vue?vue&type=template&id=5279fea6":
/*!**************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseButton.vue?vue&type=template&id=5279fea6 ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("button", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseInputText.vue?vue&type=template&id=8f62a728":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseInputText.vue?vue&type=template&id=8f62a728 ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = ["id", "name", "type", "placeholder"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("input", {
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.text = $event;
    }),
    id: $props.name,
    name: $props.name,
    type: $props.type,
    placeholder: $props.placeholder,
    "class": "block px-3 py-2 mt-1 w-full bg-white rounded-md border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
  }, null, 8
  /* PROPS */
  , _hoisted_1)), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelDynamic, $setup.text]]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseLabel.vue?vue&type=template&id=0b3d7f49":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseLabel.vue?vue&type=template&id=0b3d7f49 ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = ["for"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("label", {
    "for": $props.htmlFor,
    "class": "block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")], 8
  /* PROPS */
  , _hoisted_1);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/products/ProductsEdit.vue?vue&type=template&id=7ace888a":
/*!**************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/products/ProductsEdit.vue?vue&type=template&id=7ace888a ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "w-full h-auto bg-white rounded-sm shadow-md"
};
var _hoisted_2 = {
  "class": "p-5"
};
var _hoisted_3 = {
  "class": "w-full"
};

var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("名稱");

var _hoisted_5 = {
  "class": "mt-4 w-full"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("縮圖");

var _hoisted_7 = {
  "class": "flex"
};
var _hoisted_8 = ["src"];
var _hoisted_9 = {
  "class": "mt-4 w-full"
};

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("摘要");

var _hoisted_11 = {
  "class": "flex justify-end mt-4 w-full"
};

var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" 更新作品 ");

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_base_label = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("base-label");

  var _component_base_input_text = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("base-input-text");

  var _component_base_button = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("base-button");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Transition, {
    name: "fade"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_base_label, {
        "html-for": "name"
      }, {
        "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
          return [_hoisted_4];
        }),
        _: 1
        /* STABLE */

      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_base_input_text, {
        value: $setup.product.name,
        "onUpdate:value": _cache[0] || (_cache[0] = function ($event) {
          return $setup.product.name = $event;
        }),
        name: "name",
        placeholder: "名稱"
      }, null, 8
      /* PROPS */
      , ["value"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_base_label, {
        "html-for": "thumbnail"
      }, {
        "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
          return [_hoisted_6];
        }),
        _: 1
        /* STABLE */

      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
        type: "file",
        onChange: _cache[1] || (_cache[1] = function ($event) {
          return $setup.getThumbnail($event);
        }),
        id: "thumbnail",
        name: "thumbnail",
        placeholder: "縮圖"
      }, null, 32
      /* HYDRATE_EVENTS */
      ), $setup.thumbnailSrc !== null ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("img", {
        key: 0,
        src: $setup.thumbnailSrc,
        alt: "縮圖",
        "class": "w-auto h-24"
      }, null, 8
      /* PROPS */
      , _hoisted_8)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_base_label, {
        "html-for": "excerpt"
      }, {
        "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
          return [_hoisted_10];
        }),
        _: 1
        /* STABLE */

      }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_base_input_text, {
        value: $setup.product.excerpt,
        "onUpdate:value": _cache[2] || (_cache[2] = function ($event) {
          return $setup.product.excerpt = $event;
        }),
        name: "excerpt",
        placeholder: "摘要"
      }, null, 8
      /* PROPS */
      , ["value"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_base_button, {
        onClick: $setup.updateProduct
      }, {
        "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
          return [_hoisted_12];
        }),
        _: 1
        /* STABLE */

      }, 8
      /* PROPS */
      , ["onClick"])])])], 512
      /* NEED_PATCH */
      ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vShow, $setup.isShow]])];
    }),
    _: 1
    /* STABLE */

  });
}

/***/ }),

/***/ "./resources/js/api/product.js":
/*!*************************************!*\
  !*** ./resources/js/api/product.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "apiGetProducts": () => (/* binding */ apiGetProducts),
/* harmony export */   "apiGetProduct": () => (/* binding */ apiGetProduct),
/* harmony export */   "apiCreateProduct": () => (/* binding */ apiCreateProduct),
/* harmony export */   "apiUpdateProduct": () => (/* binding */ apiUpdateProduct),
/* harmony export */   "apiDeleteProduct": () => (/* binding */ apiDeleteProduct)
/* harmony export */ });
/* harmony import */ var _https__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./https */ "./resources/js/api/https.js");

var apiGetProducts = function apiGetProducts(data) {
  return (0,_https__WEBPACK_IMPORTED_MODULE_0__["default"])('get', '/products', data);
};
var apiGetProduct = function apiGetProduct(id) {
  return (0,_https__WEBPACK_IMPORTED_MODULE_0__["default"])('get', '/products/' + id);
};
var apiCreateProduct = function apiCreateProduct(data) {
  return (0,_https__WEBPACK_IMPORTED_MODULE_0__["default"])('post', '/products', data);
};
var apiUpdateProduct = function apiUpdateProduct(id, data) {
  return (0,_https__WEBPACK_IMPORTED_MODULE_0__["default"])('post', '/products/' + id, data);
};
var apiDeleteProduct = function apiDeleteProduct(id) {
  return (0,_https__WEBPACK_IMPORTED_MODULE_0__["default"])('delete', '/products/' + id);
};

/***/ }),

/***/ "./resources/js/views/components/BaseButton.vue":
/*!******************************************************!*\
  !*** ./resources/js/views/components/BaseButton.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _BaseButton_vue_vue_type_template_id_5279fea6__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseButton.vue?vue&type=template&id=5279fea6 */ "./resources/js/views/components/BaseButton.vue?vue&type=template&id=5279fea6");
/* harmony import */ var _BaseButton_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BaseButton.vue?vue&type=script&lang=js */ "./resources/js/views/components/BaseButton.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_BaseButton_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_BaseButton_vue_vue_type_template_id_5279fea6__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/components/BaseButton.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/components/BaseInputText.vue":
/*!*********************************************************!*\
  !*** ./resources/js/views/components/BaseInputText.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _BaseInputText_vue_vue_type_template_id_8f62a728__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseInputText.vue?vue&type=template&id=8f62a728 */ "./resources/js/views/components/BaseInputText.vue?vue&type=template&id=8f62a728");
/* harmony import */ var _BaseInputText_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BaseInputText.vue?vue&type=script&lang=js */ "./resources/js/views/components/BaseInputText.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_BaseInputText_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_BaseInputText_vue_vue_type_template_id_8f62a728__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/components/BaseInputText.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/components/BaseLabel.vue":
/*!*****************************************************!*\
  !*** ./resources/js/views/components/BaseLabel.vue ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _BaseLabel_vue_vue_type_template_id_0b3d7f49__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseLabel.vue?vue&type=template&id=0b3d7f49 */ "./resources/js/views/components/BaseLabel.vue?vue&type=template&id=0b3d7f49");
/* harmony import */ var _BaseLabel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BaseLabel.vue?vue&type=script&lang=js */ "./resources/js/views/components/BaseLabel.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_BaseLabel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_BaseLabel_vue_vue_type_template_id_0b3d7f49__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/components/BaseLabel.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/products/ProductsEdit.vue":
/*!******************************************************!*\
  !*** ./resources/js/views/products/ProductsEdit.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProductsEdit_vue_vue_type_template_id_7ace888a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductsEdit.vue?vue&type=template&id=7ace888a */ "./resources/js/views/products/ProductsEdit.vue?vue&type=template&id=7ace888a");
/* harmony import */ var _ProductsEdit_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductsEdit.vue?vue&type=script&lang=js */ "./resources/js/views/products/ProductsEdit.vue?vue&type=script&lang=js");
/* harmony import */ var C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_Users_k0937_Desktop_laradock_moonnight_blog_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_ProductsEdit_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_ProductsEdit_vue_vue_type_template_id_7ace888a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/products/ProductsEdit.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/components/BaseButton.vue?vue&type=script&lang=js":
/*!******************************************************************************!*\
  !*** ./resources/js/views/components/BaseButton.vue?vue&type=script&lang=js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseButton_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseButton_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BaseButton.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseButton.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/components/BaseInputText.vue?vue&type=script&lang=js":
/*!*********************************************************************************!*\
  !*** ./resources/js/views/components/BaseInputText.vue?vue&type=script&lang=js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseInputText_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseInputText_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BaseInputText.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseInputText.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/components/BaseLabel.vue?vue&type=script&lang=js":
/*!*****************************************************************************!*\
  !*** ./resources/js/views/components/BaseLabel.vue?vue&type=script&lang=js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseLabel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseLabel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BaseLabel.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseLabel.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/products/ProductsEdit.vue?vue&type=script&lang=js":
/*!******************************************************************************!*\
  !*** ./resources/js/views/products/ProductsEdit.vue?vue&type=script&lang=js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsEdit_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsEdit_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ProductsEdit.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/products/ProductsEdit.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/components/BaseButton.vue?vue&type=template&id=5279fea6":
/*!************************************************************************************!*\
  !*** ./resources/js/views/components/BaseButton.vue?vue&type=template&id=5279fea6 ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseButton_vue_vue_type_template_id_5279fea6__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseButton_vue_vue_type_template_id_5279fea6__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BaseButton.vue?vue&type=template&id=5279fea6 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseButton.vue?vue&type=template&id=5279fea6");


/***/ }),

/***/ "./resources/js/views/components/BaseInputText.vue?vue&type=template&id=8f62a728":
/*!***************************************************************************************!*\
  !*** ./resources/js/views/components/BaseInputText.vue?vue&type=template&id=8f62a728 ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseInputText_vue_vue_type_template_id_8f62a728__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseInputText_vue_vue_type_template_id_8f62a728__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BaseInputText.vue?vue&type=template&id=8f62a728 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseInputText.vue?vue&type=template&id=8f62a728");


/***/ }),

/***/ "./resources/js/views/components/BaseLabel.vue?vue&type=template&id=0b3d7f49":
/*!***********************************************************************************!*\
  !*** ./resources/js/views/components/BaseLabel.vue?vue&type=template&id=0b3d7f49 ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseLabel_vue_vue_type_template_id_0b3d7f49__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BaseLabel_vue_vue_type_template_id_0b3d7f49__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BaseLabel.vue?vue&type=template&id=0b3d7f49 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/components/BaseLabel.vue?vue&type=template&id=0b3d7f49");


/***/ }),

/***/ "./resources/js/views/products/ProductsEdit.vue?vue&type=template&id=7ace888a":
/*!************************************************************************************!*\
  !*** ./resources/js/views/products/ProductsEdit.vue?vue&type=template&id=7ace888a ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsEdit_vue_vue_type_template_id_7ace888a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ProductsEdit_vue_vue_type_template_id_7ace888a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ProductsEdit.vue?vue&type=template&id=7ace888a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/products/ProductsEdit.vue?vue&type=template&id=7ace888a");


/***/ })

}]);