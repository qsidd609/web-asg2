document.addEventListener("DOMContentLoaded", function(){
    
    let countryAPI = "api-countries.php";
    let cityAPI = "api-cities.php";
    let countriesWithImagesCheck = 0;
    let languagesCheck = 0;
    
    //---------------------------------------------------------
    //fetch all the countries from the api with the iso parameter
    fetch(countryAPI + "?iso=all")
    .then(response => response.json())
    .then(data => {
        //sorting the countires as soon as they are found to avoid having to do it multiple times later
        let sortedData = data.sort((a,b) => {
            return a.CountryName < b.CountryName ? -1 : 1;
        })
        //putting the sorted list into local storage to be stored
        updateStorage("countries", sortedData);
        //printing out the whole list of countries
        fillCountryList(retriveStorage("countries"));
    })
    .catch(e => console.error(e));
    
    //-----------------------------------------------------------
    //this function prints out the list provided into the country list. Made a function to avoid repetitive code
    function fillCountryList(list) {
        list.forEach(c => {
            let a = document.createElement("a");
            a.setAttribute("href", "single-country.php?iso=" + c.ISO);
            a.appendChild(document.createTextNode(c.CountryName));
            let li = document.createElement("li");
            li.appendChild(a);
            document.querySelector("#singleCountryCountries").appendChild(li);
        })
    }
    
    //--------------------------------------------------------------------------------------
    //to store inforamtion into local storage
    function updateStorage(name , file)
    {
        localStorage.setItem(name, JSON.stringify(file));
    }
    
    //-----------------------------------------------------------------------------------
    //to get information from local storage
    function retriveStorage(name)
    {
        return JSON.parse(localStorage.getItem(name));
    } 
    
    //----------------------------------------------------------
    //this event listener is for showing the country list depending on the continenet the user chose
    document.getElementById('singleCountryConList').addEventListener('change', e =>
    {
        //clear the country list
        clearCountryList();
        //get the list of countries  
        let countries = retriveStorage('countries');
        //find countries depending on the continent and the value of the option selected
        let manipulatedCountries = countries.filter(c => c.Continent == e.target.value);
        //print out new list
        fillCountryList(manipulatedCountries);
    });
    
    //-----------------------------------------------------------
    //this function clears all elements in the country list
    function clearCountryList() {
        let countryList = document.querySelector("#singleCountryCountries");
        //first checks and finds to see if there are any elements
        if (countryList.getElementsByTagName('*').length > 0)
            {
                //if there are elements, getting all the elements then removing them
                let countryListElements = document.querySelectorAll('#singleCountryCountries li');
                countryListElements.forEach( c => countryList.removeChild(c));
            }
    }

    //------------------------------------------------------------
    
     document.getElementById('singleCountryCountryButton').addEventListener('click', e => {
        //clear current country list
        clearCountryList();
        //check to see if the country list with images has been fetched yet
        if(countriesWithImagesCheck == 1)
            {
                //if it has, the country list is printed with the list that has images
                fillCountryList(retriveStorage('countriesWithImages'));
            }
        else
            {
                //if not, the countries with images list is loaded and the results are printed
                fetch(countryAPI + ("?image=true"))
                .then(response => response.json())
                .then(data => {
                    updateStorage('countriesWithImages', data);
                    fillCountryList(data);
                })
                .catch(e => console.error(e));
                //check is changed to one so if the same option is selected, no longer needed to fetch
                countriesWithImagesCheck =1;
            }
    });
    
    //------------------------------------------------------------
    //when reset button is pressed, it clears the current list and prints out a list of all countries       
    document.querySelector("#singleCountryResetCountryFilters").addEventListener('click', e => {
        if (e.target.nodeName == "BUTTON")
            {
                let filter = document.querySelector("#singleCountryFiltersForCountries");
                //makes sure that the country filter is not hidden
                filter.classList.remove("hidden");
                //clear the list
                clearCountryList();
                //put the previous elements back in the list
                fillCountryList(retriveStorage('countries'));
            }
    })
    
        //-------------------------------------------------------------
    //for searching countries by name. code used from lab exercies
    document.querySelector(".singleCountrySearchForCountry").addEventListener('keyup', displayMatchesCountries);
    
    function displayMatchesCountries(){
        let countries = retriveStorage('countries');
        let matches = findMatches(document.querySelector(".searchCountry").value, countries);
        clearCountryList();
        fillCountryList(matches);
        }
    
    //-------------------------------------------------------------
    
    
    function findMatches(wordToMatch, list){
        return list.filter(obj => {
            const regex = new RegExp(wordToMatch, 'gi');
            return obj.CountryName.match(regex);
        })
    }
    
    //-------------------------------------------------------------
    //this hides all the filter options
    document.querySelector("#singleCountryHideCountryFilters").addEventListener('click', e => {
        if (e.target.nodeName == "BUTTON")
            {
                //puts the classlist to hidden from the css and html code
                let hide = document.querySelector("#singleCountryFiltersForCountries");
                hide.classList.toggle("hidden");
            }
    })
    
    //----------------------------------------------------------
    //this event listener is for showing the country list depending on the continenet the user chose
    document.getElementById('singleCountryConList').addEventListener('change', e =>
    {
        //clear the country list
        clearCountryList();
        //get the list of countries  
        let countries = retriveStorage('countries');
        //find countries depending on the continent and the value of the option selected
        let manipulatedCountries = countries.filter(c => c.Continent == e.target.value);
        //print out new list
        fillCountryList(manipulatedCountries);
    });
    
    
});