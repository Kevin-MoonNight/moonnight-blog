/*! For license information please see 330.js.LICENSE.txt */
(self.webpackChunk=self.webpackChunk||[]).push([[330],{7631:function(e){e.exports=function(){"use strict";function e(){return"undefined"!=typeof window}function t(){var e=!1;try{var t={get passive(){e=!0}};window.addEventListener("test",t,t),window.removeEventListener("test",t,t)}catch(t){e=!1}return e}function n(){return!!(e()&&function(){}.bind&&"classList"in document.documentElement&&Object.assign&&Object.keys&&requestAnimationFrame)}function o(e){return 9===e.nodeType}function i(e){return e&&e.document&&o(e.document)}function l(e){var t=e.document,n=t.body,o=t.documentElement;return{scrollHeight:function(){return Math.max(n.scrollHeight,o.scrollHeight,n.offsetHeight,o.offsetHeight,n.clientHeight,o.clientHeight)},height:function(){return e.innerHeight||o.clientHeight||n.clientHeight},scrollY:function(){return void 0!==e.pageYOffset?e.pageYOffset:(o||n.parentNode||n).scrollTop}}}function s(e){return{scrollHeight:function(){return Math.max(e.scrollHeight,e.offsetHeight,e.clientHeight)},height:function(){return Math.max(e.offsetHeight,e.clientHeight)},scrollY:function(){return e.scrollTop}}}function r(e){return i(e)?l(e):s(e)}function a(e,n,o){var i,l=t(),s=!1,a=r(e),c=a.scrollY(),u={};function d(){var e=Math.round(a.scrollY()),t=a.height(),i=a.scrollHeight();u.scrollY=e,u.lastScrollY=c,u.direction=e>c?"down":"up",u.distance=Math.abs(e-c),u.isOutOfBounds=e<0||e+t>i,u.top=e<=n.offset[u.direction],u.bottom=e+t>=i,u.toleranceExceeded=u.distance>n.tolerance[u.direction],o(u),c=e,s=!1}function h(){s||(s=!0,i=requestAnimationFrame(d))}var m=!!l&&{passive:!0,capture:!1};return e.addEventListener("scroll",h,m),d(),{destroy:function(){cancelAnimationFrame(i),e.removeEventListener("scroll",h,m)}}}function c(e){return e===Object(e)?e:{down:e,up:e}}function u(e,t){t=t||{},Object.assign(this,u.options,t),this.classes=Object.assign({},u.options.classes,t.classes),this.elem=e,this.tolerance=c(this.tolerance),this.offset=c(this.offset),this.initialised=!1,this.frozen=!1}return u.prototype={constructor:u,init:function(){return u.cutsTheMustard&&!this.initialised&&(this.addClass("initial"),this.initialised=!0,setTimeout((function(e){e.scrollTracker=a(e.scroller,{offset:e.offset,tolerance:e.tolerance},e.update.bind(e))}),100,this)),this},destroy:function(){this.initialised=!1,Object.keys(this.classes).forEach(this.removeClass,this),this.scrollTracker.destroy()},unpin:function(){!this.hasClass("pinned")&&this.hasClass("unpinned")||(this.addClass("unpinned"),this.removeClass("pinned"),this.onUnpin&&this.onUnpin.call(this))},pin:function(){this.hasClass("unpinned")&&(this.addClass("pinned"),this.removeClass("unpinned"),this.onPin&&this.onPin.call(this))},freeze:function(){this.frozen=!0,this.addClass("frozen")},unfreeze:function(){this.frozen=!1,this.removeClass("frozen")},top:function(){this.hasClass("top")||(this.addClass("top"),this.removeClass("notTop"),this.onTop&&this.onTop.call(this))},notTop:function(){this.hasClass("notTop")||(this.addClass("notTop"),this.removeClass("top"),this.onNotTop&&this.onNotTop.call(this))},bottom:function(){this.hasClass("bottom")||(this.addClass("bottom"),this.removeClass("notBottom"),this.onBottom&&this.onBottom.call(this))},notBottom:function(){this.hasClass("notBottom")||(this.addClass("notBottom"),this.removeClass("bottom"),this.onNotBottom&&this.onNotBottom.call(this))},shouldUnpin:function(e){return"down"===e.direction&&!e.top&&e.toleranceExceeded},shouldPin:function(e){return"up"===e.direction&&e.toleranceExceeded||e.top},addClass:function(e){this.elem.classList.add.apply(this.elem.classList,this.classes[e].split(" "))},removeClass:function(e){this.elem.classList.remove.apply(this.elem.classList,this.classes[e].split(" "))},hasClass:function(e){return this.classes[e].split(" ").every((function(e){return this.classList.contains(e)}),this.elem)},update:function(e){e.isOutOfBounds||!0!==this.frozen&&(e.top?this.top():this.notTop(),e.bottom?this.bottom():this.notBottom(),this.shouldUnpin(e)?this.unpin():this.shouldPin(e)&&this.pin())}},u.options={tolerance:{up:0,down:0},offset:0,scroller:e()?window:null,classes:{frozen:"headroom--frozen",pinned:"headroom--pinned",unpinned:"headroom--unpinned",top:"headroom--top",notTop:"headroom--not-top",bottom:"headroom--bottom",notBottom:"headroom--not-bottom",initial:"headroom"}},u.cutsTheMustard=n(),u}()},326:(e,t,n)=>{"use strict";n.r(t),n.d(t,{default:()=>se});var o=n(821);var i={class:"sticky top-0 z-50 bg-white shadow-lg"},l={class:"container flex justify-between items-center w-full h-14 rounded-md md:justify-start md:px-14"},s=(0,o.createElementVNode)("p",{class:"px-4 text-xl"},"MoonNight",-1),r={class:"hidden md:flex md:items-center"},a={class:"px-3 py-2 ml-3 text-center text-blueGray-800 hover:text-indigo-500"},c={key:0},u=[(0,o.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-auto h-6",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor"},[(0,o.createElementVNode)("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"})],-1)],d={key:1},h=[(0,o.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-auto h-6",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor"},[(0,o.createElementVNode)("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"})],-1)],m={class:"w-full text-center bg-white bg-opacity-80"},f={class:"py-4 w-full hover:text-indigo-500"};var p=n(8410),b=n(7631),w=n.n(b);const g={setup:function(){var e=(0,p.oR)(),t=(0,o.computed)((function(){return e.state.auth.isAuth})),n=(0,o.ref)(!1),i=(0,o.ref)([{title:"首頁",data:{name:"home"},isShow:!0},{title:"文章",data:{name:"articles"},isShow:!0},{title:"專案作品",data:{name:"products"},isShow:!0},{title:"聯絡我們",data:{name:"home",hash:"#contact"},isShow:!0},{title:"後台",data:{name:"dashboard"},isShow:(0,o.computed)((function(){return t.value}))},{title:"登入",data:{name:"login"},isShow:(0,o.computed)((function(){return!t.value}))},{title:"登出",data:{name:"logout"},isShow:(0,o.computed)((function(){return t.value}))}]);return(0,o.onMounted)((function(){var e=document.querySelector("header");new(w())(e,{onUnpin:function(){n.value=!1}}).init()})),{isAuth:t,isOpen:n,links:i}}};var v=n(3744);const x=(0,v.Z)(g,[["render",function(e,t,n,p,b,w){var g=(0,o.resolveComponent)("router-link");return(0,o.openBlock)(),(0,o.createElementBlock)("header",i,[(0,o.createElementVNode)("nav",l,[(0,o.createVNode)(g,{to:{name:"home"}},{default:(0,o.withCtx)((function(){return[s]})),_:1}),(0,o.createElementVNode)("ul",r,[((0,o.openBlock)(!0),(0,o.createElementBlock)(o.Fragment,null,(0,o.renderList)(p.links,(function(e){return(0,o.openBlock)(),(0,o.createElementBlock)("li",null,[e.isShow?((0,o.openBlock)(),(0,o.createBlock)(g,{key:0,to:e.data},{default:(0,o.withCtx)((function(){return[(0,o.createElementVNode)("p",a,(0,o.toDisplayString)(e.title),1)]})),_:2},1032,["to"])):(0,o.createCommentVNode)("",!0)])})),256))]),(0,o.createElementVNode)("div",{onClick:t[0]||(t[0]=function(e){return p.isOpen=!p.isOpen}),class:"px-4 cursor-pointer md:hidden"},[p.isOpen?((0,o.openBlock)(),(0,o.createElementBlock)("div",c,u)):((0,o.openBlock)(),(0,o.createElementBlock)("div",d,h))]),(0,o.createVNode)(o.Transition,{name:"list",class:"md:hidden"},{default:(0,o.withCtx)((function(){return[(0,o.withDirectives)((0,o.createElementVNode)("div",{onClick:t[1]||(t[1]=function(e){return p.isOpen=!1}),class:"fixed top-14 w-full h-screen bg-opacity-30 bg-blueGray-700"},[(0,o.createElementVNode)("ul",m,[((0,o.openBlock)(!0),(0,o.createElementBlock)(o.Fragment,null,(0,o.renderList)(p.links,(function(e){return(0,o.openBlock)(),(0,o.createElementBlock)("li",null,[e.isShow?((0,o.openBlock)(),(0,o.createBlock)(g,{key:0,to:e.data},{default:(0,o.withCtx)((function(){return[(0,o.createElementVNode)("p",f,(0,o.toDisplayString)(e.title),1)]})),_:2},1032,["to"])):(0,o.createCommentVNode)("",!0)])})),256))])],512),[[o.vShow,p.isOpen]])]})),_:1})])])}]]);var E={class:"pt-8 pb-4 select-none bg-blueGray-800"},y={class:"container px-4 mx-auto"},N={class:"flex flex-wrap text-center lg:text-left"},k={class:"px-4 w-full lg:w-6/12"},V=(0,o.createElementVNode)("h4",{class:"text-3xl text-white"},"慕耐工作室",-1),C=(0,o.createElementVNode)("h5",{class:"mt-4 mb-2 text-lg text-blueGray-400"}," 歡迎到來我們的社群軟體看看，裡面也有很多的酷東西! ",-1),B={class:"mt-6 mb-6 lg:mb-0"},T=["href"],S=[(0,o.createElementVNode)("button",{title:"twitter",class:"justify-center items-center mr-2 w-10 h-10 font-normal text-blue-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"},[(0,o.createElementVNode)("i",{class:"fab fa-twitter"})],-1)],j=["href"],O=[(0,o.createElementVNode)("button",{title:"facebook",class:"justify-center items-center mr-2 w-10 h-10 font-normal text-blue-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"},[(0,o.createElementVNode)("i",{class:"fab fa-facebook-square"})],-1)],H=["href"],D=[(0,o.createElementVNode)("button",{title:"line",class:"justify-center items-center mr-2 w-10 h-10 font-normal text-green-400 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"},[(0,o.createElementVNode)("i",{class:"fab fa-line"})],-1)],M=["href"],L=[(0,o.createElementVNode)("button",{title:"github",class:"justify-center items-center mr-2 w-10 h-10 font-normal bg-white rounded-full shadow-lg outline-none text-blueGray-800 align-center focus:outline-none"},[(0,o.createElementVNode)("i",{class:"fab fa-github"})],-1)],G=["href"],z=[(0,o.createElementVNode)("button",{title:"youtube",class:"justify-center items-center mr-2 w-10 h-10 font-normal text-red-600 bg-white rounded-full shadow-lg outline-none align-center focus:outline-none"},[(0,o.createElementVNode)("i",{class:"fab fa-youtube"})],-1)],F={class:"px-4 w-full lg:w-6/12"},Y={class:"flex flex-wrap mb-6 items-top"},A={class:"px-4 ml-auto w-full not-italic lg:w-4/12"},U=(0,o.createElementVNode)("span",{class:"block mb-2 font-bold uppercase text-blueGray-300 text-md"},"聯絡資訊",-1),_={class:"list-unstyled"},q=["title"],P={class:"block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500"},R=["title"],Z={class:"block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500"},I=["title"],J={class:"block pb-2 text-sm font-semibold cursor-pointer text-blueGray-400 hover:text-indigo-500"},K={class:"px-4 ml-auto w-full lg:w-4/12"},Q=(0,o.createElementVNode)("span",{class:"block mb-2 font-bold uppercase text-blueGray-300 text-md"},"所有連結",-1),W={class:"font-semibold list-unstyled"},X=(0,o.createElementVNode)("hr",{class:"my-3 border-blueGray-400"},null,-1),$={class:"flex flex-wrap justify-center items-center md:justify-between"},ee={class:"px-4 mx-auto w-full text-center md:w-4/12"},te={class:"py-1 text-sm text-blueGray-500"},ne=(0,o.createElementVNode)("a",{href:"https://www.freepik.com"},"Designed by vectorjuice / Freepik",-1);var oe=n(7398);const ie={data:function(){return{name:"鄭政文",year:(new Date).getFullYear(),github:"",facebook:"",twitter:"",line:"",youtube:"",email:"123456@example.com",phone:"0912345678",location:"新北市",links:[{title:"關於我們",data:{name:"home",hash:"#about"}},{title:"文章列表",data:{name:"articles"}},{title:"專案作品",data:{name:"products"}},{title:"聯絡我們",data:{name:"home",hash:"#contact"}}]}},setup:function(){return{onCopy:oe.lT}}},le={components:{NavigationMenu:x,FooterComponent:(0,v.Z)(ie,[["render",function(e,t,n,i,l,s){var r=(0,o.resolveComponent)("router-link"),a=(0,o.resolveDirective)("clipboard");return(0,o.openBlock)(),(0,o.createElementBlock)("footer",E,[(0,o.createElementVNode)("div",y,[(0,o.createElementVNode)("div",N,[(0,o.createElementVNode)("div",k,[V,C,(0,o.createElementVNode)("div",B,[(0,o.createElementVNode)("a",{href:l.twitter},S,8,T),(0,o.createElementVNode)("a",{href:l.facebook},O,8,j),(0,o.createElementVNode)("a",{href:l.line},D,8,H),(0,o.createElementVNode)("a",{href:l.github},L,8,M),(0,o.createElementVNode)("a",{href:l.youtube},z,8,G)])]),(0,o.createElementVNode)("div",F,[(0,o.createElementVNode)("div",Y,[(0,o.createElementVNode)("address",A,[U,(0,o.createElementVNode)("ul",_,[(0,o.withDirectives)((0,o.createElementVNode)("li",{id:"email",title:l.email},[(0,o.createElementVNode)("p",P," 電子信箱："+(0,o.toDisplayString)(l.email),1)],8,q),[[a,l.email,"copy"],[a,i.onCopy,"success"]]),(0,o.withDirectives)((0,o.createElementVNode)("li",{title:l.phone},[(0,o.createElementVNode)("p",Z," 電話："+(0,o.toDisplayString)(l.phone),1)],8,R),[[a,l.phone,"copy"],[a,i.onCopy,"success"]]),(0,o.withDirectives)((0,o.createElementVNode)("li",{title:l.location},[(0,o.createElementVNode)("p",J," 地址："+(0,o.toDisplayString)(l.location),1)],8,I),[[a,l.location,"copy"],[a,i.onCopy,"success"]])])]),(0,o.createElementVNode)("div",K,[Q,(0,o.createElementVNode)("ul",W,[((0,o.openBlock)(!0),(0,o.createElementBlock)(o.Fragment,null,(0,o.renderList)(l.links,(function(e){return(0,o.openBlock)(),(0,o.createElementBlock)("li",null,[(0,o.createVNode)(r,{to:e.data,title:e.title,class:"block pb-2 text-sm text-blueGray-400 hover:text-indigo-500"},{default:(0,o.withCtx)((function(){return[(0,o.createTextVNode)((0,o.toDisplayString)(e.title),1)]})),_:2},1032,["to","title"])])})),256))])])])])]),X,(0,o.createElementVNode)("div",$,[(0,o.createElementVNode)("div",ee,[(0,o.createElementVNode)("div",te,[ne,(0,o.createElementVNode)("p",null,"Copyright © "+(0,o.toDisplayString)(l.year)+" by "+(0,o.toDisplayString)(l.name)+" All Rights Reserved.",1)])])])])])}]])}},se=(0,v.Z)(le,[["render",function(e,t,n,i,l,s){var r=(0,o.resolveComponent)("navigation-menu"),a=(0,o.resolveComponent)("router-view"),c=(0,o.resolveComponent)("footerComponent");return(0,o.openBlock)(),(0,o.createElementBlock)(o.Fragment,null,[(0,o.createVNode)(r),(0,o.createVNode)(a),(0,o.createVNode)(c)],64)}]])}}]);
//# sourceMappingURL=330.js.map