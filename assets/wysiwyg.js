/**
 * Created by Nazi on 2/16/16.
 */
function iFrameOn() {


}
function testMe(variable) {
    // alert(variable);

    if(textEditor.document.designMode == 'off'){
        textEditor.document.designMode = 'on';
        
    }

}

function iBold() {


    textEditor.document.execCommand('bold', false, null);
}

function iUnderline() {
    textEditor.document.execCommand('underline', false, null);

}

function iItalic() {
    textEditor.document.execCommand('italic', false, null);

}
function iFontSize(size) {

    textEditor.document.execCommand('FontSize', false, size);

}
function iForeColor() {
    var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors', '');

    textEditor.document.execCommand('ForeColor', false, color);

}
function iHorizontalRule() {
    textEditor.document.execCommand('inserthorizontalrule', false, null);

}
function iUnorderedList() {

    textEditor.document.execCommand('InsertUnorderedList ', false, "newUL");

}
function iOrderedList() {

    textEditor.document.execCommand('InsertOrderedList', false, "newOL")
}
function iLink() {
    linkUrl = prompt("Enter the URL for this link", "http://");
    textEditor.document.execCommand('CreateLInk', false, linkUrl)

}
function iUnLInk() {
    textEditor.document.execCommand('Unlink', false, null)

}
function iImage(imgSrc) {

    textEditor.document.execCommand('insertimage', false, imgSrc);

}