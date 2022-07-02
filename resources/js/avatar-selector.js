import {createApp} from 'vue';
import AvatarSelector from "./views/components/AvatarSelector";

const avatarSelectorApp = createApp({});
avatarSelectorApp.component('avatar-selector', AvatarSelector);
avatarSelectorApp.mount('#avatar-selector-app');
