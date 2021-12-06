"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[762],{6762:(e,n,l)=>{l.r(n),l.d(n,{default:()=>Z});var t=l(821),a={class:"flex relative w-full h-screen bg-blueGray-700"},o={class:"overflow-y-auto p-5 w-full h-full xl:w-4/5"};var i={class:"hidden z-50 w-1/5 h-full select-none xl:block"},c={class:"overflow-y-auto py-8 w-full h-full text-blueGray-200 bg-blueGray-800"},s=(0,t.createElementVNode)("div",{class:"px-6 py-4 w-full text-indigo-500"},[(0,t.createElementVNode)("p",{class:"text-2xl"},"MoonNight")],-1),r={key:0,class:"flex fixed z-50 w-full h-full xl:hidden"},m={class:"overflow-y-auto py-8 w-3/4 h-full md:w-1/4 text-blueGray-200 bg-blueGray-800"},u=(0,t.createElementVNode)("div",{class:"px-6 py-4 w-full text-indigo-500"},[(0,t.createElementVNode)("p",{class:"text-2xl"},"MoonNight")],-1);var d={class:"px-6 w-full"},f={key:0},p={class:"flex items-center"},h=["innerHTML"],v={class:"ml-3"},k={key:0},g=[(0,t.createElementVNode)("i",{class:"fas fa-chevron-down"},null,-1)],N={key:1},w=[(0,t.createElementVNode)("i",{class:"fas fa-chevron-right"},null,-1)],y=["innerHTML"],E={class:"ml-3"},V={class:"pl-3"};const x={props:["name","link","icon","childItems","closeNav"],data:function(){return{isOpen:!1}},setup:function(e){var n=(0,t.toRefs)(e);return{name:n.name,link:n.link,icon:n.icon,childItems:n.childItems,closeNav:n.closeNav}}};var I=l(3744);const B={components:{MenuItem:(0,I.Z)(x,[["render",function(e,n,l,a,o,i){var c=(0,t.resolveComponent)("router-link"),s=(0,t.resolveComponent)("menu-item",!0);return(0,t.openBlock)(),(0,t.createElementBlock)("div",d,[null!==a.childItems?((0,t.openBlock)(),(0,t.createElementBlock)("div",f,[(0,t.createElementVNode)("div",{onClick:n[0]||(n[0]=function(e){return o.isOpen=!o.isOpen}),class:"flex justify-between items-center w-full h-16 duration-200 transform cursor-pointer hover:pl-1 hover:text-indigo-500"},[(0,t.createElementVNode)("div",p,[(0,t.createElementVNode)("div",{innerHTML:a.icon},null,8,h),(0,t.createElementVNode)("p",v,(0,t.toDisplayString)(a.name),1)]),o.isOpen?((0,t.openBlock)(),(0,t.createElementBlock)("div",k,g)):((0,t.openBlock)(),(0,t.createElementBlock)("div",N,w))])])):((0,t.openBlock)(),(0,t.createElementBlock)("div",{key:1,onClick:n[1]||(n[1]=function(){return a.closeNav&&a.closeNav.apply(a,arguments)}),class:"flex justify-between items-center w-full h-16 duration-200 transform hover:pl-1 hover:text-indigo-500"},[(0,t.createVNode)(c,{to:a.link,class:"flex items-center"},{default:(0,t.withCtx)((function(){return[(0,t.createElementVNode)("div",{innerHTML:a.icon},null,8,y),(0,t.createElementVNode)("p",E,(0,t.toDisplayString)(a.name),1)]})),_:1},8,["to"])])),(0,t.createVNode)(t.Transition,{name:"list"},{default:(0,t.withCtx)((function(){return[(0,t.withDirectives)((0,t.createElementVNode)("div",V,[((0,t.openBlock)(!0),(0,t.createElementBlock)(t.Fragment,null,(0,t.renderList)(a.childItems,(function(e){return(0,t.openBlock)(),(0,t.createBlock)(s,{name:e.name,icon:e.icon,link:e.link,childItems:e.childItems,"close-nav":a.closeNav},null,8,["name","icon","link","childItems","close-nav"])})),256))],512),[[t.vShow,o.isOpen]])]})),_:1})])}]])},props:{isOpen:{type:Boolean,required:!0},closeNav:{type:Boolean,required:!0}},data:function(){return{items:[{name:"儀錶板",link:{name:"dashboard"},icon:'<i class="fas fa-home"></i>',childItems:null},{name:"文章管理",icon:'<i class="far fa-newspaper"></i>',childItems:[{name:"文章列表",link:{name:"articlesManage"},icon:'<i class="fas fa-list"></i>',childItems:null},{name:"新增文章",link:{name:"articlesCreate"},icon:'<i class="fas fa-plus"></i>',childItems:null},{name:"草稿",link:{name:"articlesDraft"},icon:'<i class="fas fa-newspaper"></i>',childItems:null},{name:"垃圾桶",link:{name:"articlesTrashed"},icon:'<i class="fas fa-trash"></i>',childItems:null}]},{name:"標籤管理",icon:'<i class="fas fa-tags"></i>',childItems:[{name:"標籤列表",link:{name:"tagsManage"},icon:'<i class="fas fa-list"></i>',childItems:null},{name:"新增標籤",link:{name:"tagsCreate"},icon:'<i class="fas fa-tag"></i>',childItems:null}]},{name:"作品管理",icon:'<i class="fas fa-code"></i>',childItems:[{name:"作品列表",link:{name:"productsManage"},icon:'<i class="fas fa-list"></i>',childItems:null},{name:"新增作品",link:{name:"productsCreate"},icon:'<i class="fas fa-file-code"></i>',childItems:null}]},{name:"訊息管理",icon:'<i class="far fa-comment-dots"></i>',childItems:[{name:"所有訊息",link:{name:"messagesManage"},icon:'<i class="fas fa-list"></i>',childItems:null}]},{name:"會員管理",icon:'<i class="fas fa-users"></i>',childItems:[{name:"所有會員",link:{name:"usersManage"},icon:'<i class="fas fa-list"></i>',childItems:null}]},{name:"個人設定",link:{name:"setting"},icon:' <i class="far fa-user"></i>',childItems:null},{name:"返回首頁",link:{name:"home"},icon:'<i class="fas fa-reply"></i>',childItems:null}]}}},b=(0,I.Z)(B,[["render",function(e,n,l,a,o,d){var f=(0,t.resolveComponent)("menu-item");return(0,t.openBlock)(),(0,t.createElementBlock)(t.Fragment,null,[(0,t.createElementVNode)("div",i,[(0,t.createElementVNode)("nav",c,[s,((0,t.openBlock)(!0),(0,t.createElementBlock)(t.Fragment,null,(0,t.renderList)(o.items,(function(e){return(0,t.openBlock)(),(0,t.createBlock)(f,{name:e.name,icon:e.icon,link:e.link,childItems:e.childItems,"close-nav":l.closeNav},null,8,["name","icon","link","childItems","close-nav"])})),256))])]),(0,t.createVNode)(t.Transition,{name:"fade"},{default:(0,t.withCtx)((function(){return[l.isOpen?((0,t.openBlock)(),(0,t.createElementBlock)("div",r,[(0,t.createElementVNode)("nav",m,[u,((0,t.openBlock)(!0),(0,t.createElementBlock)(t.Fragment,null,(0,t.renderList)(o.items,(function(e){return(0,t.openBlock)(),(0,t.createBlock)(f,{name:e.name,icon:e.icon,link:e.link,childItems:e.childItems,"close-nav":l.closeNav},null,8,["name","icon","link","childItems","close-nav"])})),256))]),(0,t.createElementVNode)("div",{class:"w-1/4 h-full bg-opacity-30 md:w-3/4 bg-blueGray-700",onClick:n[0]||(n[0]=function(e){return l.isOpen=!1})})])):(0,t.createCommentVNode)("",!0)]})),_:1})],64)}]]);var C={class:"flex justify-between px-6 py-3 mb-10 h-16 text-gray-200 rounded-sm shadow-md bg-blueGray-600"},O=[(0,t.createElementVNode)("i",{class:"fas fa-bars"},null,-1)],M={class:"relative h-full"},D={class:"flex items-center h-full"},L={class:""},T=["src"],G={class:"absolute py-2 mt-16 h-auto text-gray-900 bg-white rounded-md min-w-32"};var S=l(7398),_=l(8410);const F={props:{changeOpen:{type:Function,required:!0}},setup:function(e){var n=(0,_.oR)(),l=(0,t.toRefs)(e).changeOpen;return{user:(0,t.computed)((function(){return n.state.auth.user})),profileDropdown:(0,t.ref)(!1),changeOpen:l,logout:S.kS}}},H={components:{UserNavigation:(0,I.Z)(F,[["render",function(e,n,l,a,o,i){return(0,t.openBlock)(),(0,t.createElementBlock)("nav",C,[(0,t.createElementVNode)("button",{onClick:n[0]||(n[0]=function(){return a.changeOpen&&a.changeOpen.apply(a,arguments)}),class:"h-full xl:hidden"},O),(0,t.createElementVNode)("div",M,[(0,t.createElementVNode)("div",D,[(0,t.createElementVNode)("p",L,(0,t.toDisplayString)(a.user.name),1),(0,t.createElementVNode)("button",{onClick:n[1]||(n[1]=function(e){return a.profileDropdown=!a.profileDropdown}),class:"ml-3 h-full"},[(0,t.createElementVNode)("img",{src:a.user.profile_photo_url,alt:"無法載入圖片",class:"h-full rounded-full"},null,8,T)])]),(0,t.createVNode)(t.Transition,{name:"list"},{default:(0,t.withCtx)((function(){return[(0,t.withDirectives)((0,t.createElementVNode)("div",G,[(0,t.createElementVNode)("button",{onClick:n[2]||(n[2]=function(){return a.logout&&a.logout.apply(a,arguments)}),class:"px-5 py-3 w-full hover:bg-gray-200"},"Logout")],512),[[t.vShow,a.profileDropdown]])]})),_:1})])])}]]),NavigationMenu:b},setup:function(){var e=(0,t.ref)(!1);return{isOpen:e,changeOpen:function(){e.value=!e.value},closeNav:function(){e.value=!1}}}},Z=(0,I.Z)(H,[["render",function(e,n,l,i,c,s){var r=(0,t.resolveComponent)("navigation-menu"),m=(0,t.resolveComponent)("user-navigation"),u=(0,t.resolveComponent)("router-view");return(0,t.openBlock)(),(0,t.createElementBlock)("div",a,[(0,t.createVNode)(r,{"is-open":i.isOpen,"close-nav":i.closeNav},null,8,["is-open","close-nav"]),(0,t.createElementVNode)("div",o,[(0,t.createVNode)(m,{"change-open":i.changeOpen},null,8,["change-open"]),(0,t.createVNode)(u)])])}]])}}]);
//# sourceMappingURL=762.js.map