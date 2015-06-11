// Calls a dialog for people to vote in

function voteUp(ID, direction) {
    votepopup = window.open("?loc=engine/dialogs/vote?id=" + ID + "&direction=" + direction + "&ispage=false",'Voter','height=300,width=400');
    if (window.focus) {
        votepopup.focus()
    };
};


// Calls a dialog for people to create a new post

function newPost() {
    newpostdialog = window.open("?loc=engine/dialogs/writepost&ispage=false" ,'New Post','height=300,width=400');
    if (window.focus) {
        newpostdialog.focus()
    };
};
