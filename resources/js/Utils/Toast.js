import 'notyf/notyf.min.css'; // for React, Vue and Svelte

import { Notyf } from 'notyf';

// Create an instance of Notyf
const notyf = new Notyf({
    position:{
        x:'right',
        y:'top'
    },
    dismissible:true,
    ripple:true,
    
});

// Display an error notification 
export default notyf;