function validateForm() {
    // Get all form field values
    let name = document.forms["myForm"]["name"].value;
    let skill = document.forms["myForm"]["skill"].value;
    let hobby = document.forms["myForm"]["hobby"].value;
    let goal = document.forms["myForm"]["goal"].value;
    let favorite_language = document.forms["myForm"]["favorite_language"].value;
    let strength = document.forms["myForm"]["strength"].value;
    let favorite_food = document.forms["myForm"]["favorite_food"].value;
    
    // Check if any field is empty
    if (name === "") {
        alert("❌ Name is required! Please enter your name.");
        return false;
    }
    
    if (skill === "") {
        alert("❌ Skill is required! Please enter your favorite skill.");
        return false;
    }
    
    if (hobby === "") {
        alert("❌ Hobby is required! Please enter your hobby.");
        return false;
    }
    
    if (goal === "") {
        alert("❌ Goal is required! Please enter your goal in life.");
        return false;
    }
    
    if (favorite_language === "") {
        alert("❌ Favorite Language is required! Please enter your favorite programming language.");
        return false;
    }
    
    if (strength === "") {
        alert("❌ Strength is required! Please enter your greatest strength.");
        return false;
    }
    
    if (favorite_food === "") {
        alert("❌ Favorite Food is required! Please enter your favorite food.");
        return false;
    }
    
    // If all fields are filled
    alert("✅ Form validated successfully! Submitting your profile...");
    return true;
}