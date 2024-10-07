//create an array to store the country names from the database
let countryNames = [];
//store original list items for resetting
let originalListItems = [];

//make a variable to store the input element from html 
const inputEl = document.querySelector("#autocomplete-input");
const listEl = document.querySelector("#countries-list");

//fetch country names from the database 
async function getCountryData() {
    //try statement to catch errors when fetching the data 
    try {
        const countryRes = await fetch('search.php');//get data from the php file 
        const data = await countryRes.json();//convert the data to json format 

        //store the converted data in the new array 
        countryNames = data;
        saveOriginalListState();  //initial state of the list
    } catch (error) {
        //log the errors if any
        console.error('Error fetching data:', error);
    }
}

//save the original list items to reset when input is cleared
function saveOriginalListState() {
    originalListItems = Array.from(listEl.children);
}

//input changes when user types in the search bar 
inputEl.addEventListener("input", onInputChange);

// function to handle input changes 
function onInputChange() {

    //convert the input value into lowercase to make the search case insensitive 
    const value = inputEl.value.toLowerCase();

    //if the input value is empty(0) return 
    if (value.length === 0) {
        resetList();
        return;
    }

    //create a new array to store the filetered country names 
    //filter country names based on input 
    //make the search case insensitive and match the input value witht the country names eg.eden should suggest sweden 
    const filteredNames = countryNames.filter(countryName =>
        countryName.toLowerCase().includes(value)//check if the country name includes what is written on the search bar  
    );
    updateList(filteredNames);
}

//update the list with filtered results
function updateList(filteredNames) {
    listEl.innerHTML = "";  //clear existing suggestions before adding new ones

    //loop through the list of country names 
    filteredNames.forEach((country, index) => {
        //create a new list item for each country name
        const listItem = document.createElement("li");
        //create a span element to store the country  name
        const nameSpan = document.createElement("span");

        //add the country name to the span elements in html
        nameSpan.textContent = country;
        nameSpan.className = 'country-name';

        //append the span elements to the list item
        ;
        listItem.appendChild(nameSpan);
        listEl.appendChild(listItem);
    });
}

//reset the list to show all original list items form the database 
function resetList() {
    listEl.innerHTML = "";
    originalListItems.forEach(item => listEl.appendChild(item));
}

//call the function to fetch country data
getCountryData();
