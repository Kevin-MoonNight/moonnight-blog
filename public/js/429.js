"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[429],{356:(e,t,n)=>{n.d(t,{_q:()=>l,MX:()=>r,Ny:()=>u,WF:()=>o,OO:()=>s});var a=n(6779),l=function(e){return(0,a.ZP)("get","/tags",e)},r=function(e){return(0,a.ZP)("get","/tags/"+e)},u=function(e){return(0,a.ZP)("post","/tags",e)},o=function(e,t){return(0,a.ZP)("put","/tags/"+e,t)},s=function(e){return(0,a.ZP)("delete","/tags/"+e)}},4429:(e,t,n)=>{n.r(t),n.d(t,{default:()=>b});var a=n(821),l={class:"w-full h-auto bg-white rounded-sm shadow-md"},r={class:"p-5"},u={class:"w-full"},o=(0,a.createElementVNode)("label",{htmlFor:"name",class:"block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600"}," 名稱 ",-1),s={class:"mt-4 w-full"},c=(0,a.createElementVNode)("label",{htmlFor:"slug",class:"block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600"}," slug ",-1),i={class:"flex justify-end mt-4 w-full"};var d=n(7757),m=n.n(d),f=n(2119),p=n(356),g=n(8410);function v(e,t,n,a,l,r,u){try{var o=e[r](u),s=o.value}catch(e){return void n(e)}o.done?t(s):Promise.resolve(s).then(a,l)}const h={setup:function(){var e=(0,a.ref)({name:"",slug:""}),t=(0,f.tv)(),n=(0,g.oR)(),l=function(){var a,l=(a=m().mark((function a(){return m().wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return a.next=2,Promise.all([(0,p.Ny)(e.value)]).then((function(){n.dispatch("addNotice",{message:"標籤新增成功!",color:!0}),t.push({name:"tagsManage"})}));case 2:case"end":return a.stop()}}),a)})),function(){var e=this,t=arguments;return new Promise((function(n,l){var r=a.apply(e,t);function u(e){v(r,n,l,u,o,"next",e)}function o(e){v(r,n,l,u,o,"throw",e)}u(void 0)}))});return function(){return l.apply(this,arguments)}}();return{tag:e,createTag:l}}};const b=(0,n(3744).Z)(h,[["render",function(e,t,n,d,m,f){return(0,a.openBlock)(),(0,a.createElementBlock)("div",l,[(0,a.createElementVNode)("div",r,[(0,a.createElementVNode)("div",u,[o,(0,a.withDirectives)((0,a.createElementVNode)("input",{"onUpdate:modelValue":t[0]||(t[0]=function(e){return d.tag.name=e}),id:"name",type:"text",name:"name",placeholder:"名稱",class:"input-style"},null,512),[[a.vModelText,d.tag.name]])]),(0,a.createElementVNode)("div",s,[c,(0,a.withDirectives)((0,a.createElementVNode)("input",{"onUpdate:modelValue":t[1]||(t[1]=function(e){return d.tag.slug=e}),id:"slug",type:"text",name:"slug",placeholder:"slug",class:"input-style"},null,512),[[a.vModelText,d.tag.slug]])]),(0,a.createElementVNode)("div",i,[(0,a.createElementVNode)("button",{onClick:t[2]||(t[2]=function(){return d.createTag&&d.createTag.apply(d,arguments)}),class:"px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none"}," 新增標籤 ")])])])}]])}}]);
//# sourceMappingURL=429.js.map