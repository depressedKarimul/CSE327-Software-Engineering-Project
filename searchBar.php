 <!-- Search form with button and input field -->
 <form action="search.php" method="GET" class="relative">
    <button id="search-btn" type="button" class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
    <input
        id="search-input"
        type="text"
        name="query"
        placeholder="Search..."
        class="hidden absolute right-0 bg-black text-white rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
        style="width: 150px"
    />
    <input type="hidden" name="sort" value="<?php echo isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'asc'; ?>" />
</form>

</div>

<script>
  // Toggle visibility of the search input when the search button is clicked
  document.getElementById("search-btn").addEventListener("click", function () {
    const searchInput = document.getElementById("search-input");
    searchInput.classList.toggle("hidden");
    searchInput.focus();
});

document.getElementById("search-input").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        // Add or update the sort parameter if necessary
        const form = document.querySelector("form");
        if (!form.querySelector('input[name="sort"]')) {
            const sortInput = document.createElement("input");
            sortInput.type = "hidden";
            sortInput.name = "sort";
            sortInput.value = "asc"; // Default value, adjust as needed
            form.appendChild(sortInput);
        }
        form.submit();
    }
});
</script>