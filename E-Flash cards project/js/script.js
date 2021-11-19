document.addEventListener("DOMContentLoaded", () => {
    const edit_button = document.querySelector(".edit-button");
    const save_button = document.querySelector(".save-button");
    const front_text = document.getElementById("front");
    const back_text = document.getElementById("back");
    const next = document.querySelector(".right-arrow");
    const previous = document.querySelector(".left-arrow");
    
    edit_button.addEventListener("click", () => {
        front_text.contentEditable = true;
        back_text.contentEditable = true;
        front_text.style.backgroundColor = "#e6e600";
        front_text.style.color = "#121212";
        back_text.style.backgroundColor = "#e6e600";
        back_text.style.color = "#121212";
    });

    save_button.addEventListener("click", () => {
        front_text.contentEditable = false;
        back_text.contentEditable = false;
        front_text.style.backgroundColor = "#121212";
        front_text.style.color = "#e6e600";
        back_text.style.backgroundColor = "#121212";
        back_text.style.color = "#e6e600";

        $.ajax({
            method: "POST",
            url: "./php/save.php",
            data: { 
                front_display: front_text.innerHTML,
                back_display: back_text.innerHTML}
        }).success(function( msg ) {
            console.log(msg);
        });
    });

    front_text.addEventListener("click", () => {
        if (!front_text.isContentEditable){
            front_text.style.display = "none";
            back_text.style.display = "flex";
        }
    });

    back_text.addEventListener("click", () => {
        if (!back_text.isContentEditable){
            front_text.style.display = "flex";
            back_text.style.display = "none";
        }
    });

    next.addEventListener("click", () =>{
        cardNumber = <?php echo json_encode($card_number); ?>;
        console.log(cardNumber)
    });

    previous.addEventListener("click", () =>{

    });
});