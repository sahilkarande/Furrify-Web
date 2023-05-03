const search = document.getElementById('search');
const filteredNames = document.getElementById('filtered-names');
const peopleList = document.getElementById('people-list').children;

// Add event listener to the search box
search.addEventListener('input', function() {
  const query = this.value.toLowerCase();

  // Loop through each person and check if their name matches the search query
  let filtered = [];
  for (let i = 0; i < peopleList.length; i++) {
    const name = peopleList[i].getElementsByClassName('name')[0].textContent.toLowerCase();
    if (name.includes(query)) {
      peopleList[i].style.display = '';
      filtered.push(name);
    } else {
      peopleList[i].style.display = 'none';
    }
  }

  // Display the filtered names, if any
  if (filtered.length > 0) {
    filteredNames.textContent = `Filtered names: ${filtered.join(', ')}`;
    
  } else {
    filteredNames.textContent = '';
    location.reload();
    
  }
  
});