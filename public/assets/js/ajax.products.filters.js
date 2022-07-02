const filters = getFilters() ?? {page: 1, perPage: 18, sort: 'date_desc'};

$(document).ready(function () {
    if (!filters) setFilters();
    else displayFilters();

    onCheckbox();
    onSelect();
    onSearch();
    onPageChange();
    fetchData(filters);
});

function setFilters() {
    console.log('Do I go into filters');
    filters['page'] = 1;
    filters['perPage'] = 9;
    localStorage.setItem('filters', JSON.stringify({page: 1, perPage: 9, sort: 'date_desc'}))
}



function getFilters() {
    return JSON.parse(localStorage.getItem('filters'));
}

function saveFilters(filters) {
    // filters['page'] = 1;
    localStorage.setItem('filters', JSON.stringify(filters));
    fetchData(filters)
}

function addToStorage(key, value) {
    if (!filters[key]) {
        //No specified filter
        filters[key] = [];
        filters[key].push(value);
        saveFilters(filters);
    } else {
        // Filter is already in use
        filters[key].push(value);
        saveFilters(filters);
    }
}

function removeFromStorage(key, value) {
    // const filters = getFilters();
    filters[key] = removeItemFromArr(filters[key], value);
    if (filters[key].length < 1) {
        delete filters[key]
    }
    saveFilters(filters);
}


function onCheckbox() {

    $('input:checkbox').on('click', function () {
        const type = this.name;
        const value = +this.value;
        if (this.checked) {
            addToStorage(type, value);
        } else {
            removeFromStorage(type, value);
        }
    });
}

function onSelect() {
    $('select').on('change', function (e) {
        const key = this.name;
        let value = this.value;
        if (key === 'perPage') {
            value = +value;
        }
        ;
        filters[key] = value;
        saveFilters(filters);
    });
}

function onSearch() {
    $('#searchSubmit').on('click', function (index, obj) {
        const search = $('#search').val();
        if (!search) delete filters['search'];
        else filters['search'] = search;
        saveFilters(filters)
    });
}

function onPageChange() {
    $(document).on('click', '.page-link', function (event) {
        event.preventDefault();
        console.log($(this).attr('href'));
        const page = $(this).attr('href').split('page=')[1];
        console.log(page);
        filters['page'] = page;
        saveFilters(filters);
        // fetchData(filters);
    });
}

function removeItemFromArr(array, value) {
    const index = array.indexOf(value);
    if (index > -1) {
        array.splice(index, 1);
    }
    return array;
}

function displayFilters() {
    for (const item of Object.entries(filters)) {
        const key = item[0];
        const value = item[1];
        const selects = ['perPage', 'sort'];
        const checkboxes = ['categories', 'models', 'colors'];
        if (checkboxes.includes(key)) {
            displaySelectedCheckboxes(key, value);
        } else if (selects.includes(key)) {
            displaySelectedSelect(key, value);
        } else if (key === 'search') {
            $('#search').val(value);
        }
    }
}

function displaySelectedCheckboxes(key, array) {
    $(`input[name=${key}]`).each(function (index, obj) {
        if (array.includes(+obj.value)) {
            obj.checked = true;
        } else {
            obj.checked = false;
        }
    });
}

function displaySelectedSelect(key, value) {
    $(`select[name=${key}] > option`).each(function (index, obj) {
        if (obj.value == value) obj.selected = true;
        else obj.selected = false;
    });
}

function fetchData(filters) {
    const token = _token = $("input[name=_token]").val();
    $.ajax({
        url: `products/fetch?page=${filters['page']}`,
        method: 'POST',
        data: {_token: token, data: filters},
        success: function (data) {
            $('#ajax-products').html(data);
            filters['page'] = 1;
        },
        error: function (xhr, error) {
            console.log(error);
        }
    });
}




