import {MDCTextField} from '@material/textfield';
import {MDCSnackbar} from '@material/snackbar';
import {MDCRipple} from '@material/ripple';
import {MDCTabBar} from '@material/tab-bar';
import {MDCDialog} from '@material/dialog';



const snackbarElement = document.querySelector('.mdc-snackbar');

if (snackbarElement) {
    const snackbar = new MDCSnackbar(document.querySelector('.mdc-snackbar'));
    snackbar.open();
}
    
//////////////////////////////////////////////////////////////////////////////////////////////////

const textFields = document.querySelectorAll('.mdc-text-field');

textFields.forEach((textField) => {
    new MDCTextField(textField);
});

//////////////////////////////////////////////////////////////////////////////////////////////////

const fabs = document.querySelectorAll('.mdc-fab');
fabs.forEach((fab) => {
    new MDCRipple(fab);
});



const tabBars = document.querySelectorAll('.mdc-tab-bar');
tabBars.forEach((tab) => {
    new MDCTabBar(tab);
});

let dialogFab = document.getElementById('dialog-fab');
let dialogElement = document.querySelector('.mdc-dialog');

if (dialogElement && dialogFab) {
    const dialog = new MDCDialog(dialogElement);

    dialogFab.onclick = () => {
        dialog.open();
    };
}