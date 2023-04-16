function editEmployee(id) {
    href = 'employees.php';
    editRow(id, ['address', 'city', 'province', 'postal', 'phone', 'email', 'citizen'], href, 'eid');
}

function editFacility(id) {
    href = 'facilities.php';
    editRow(id, ['fname', 'address', 'city', 'province', 'postal', 'type', 'capacity', 'phone', 'website'], href, 'fid');
}

function editVaccination(id) {
    href = "vaccinations.php"
    editRow(id, ['date', 'fid'], href, 'key');
}

function editInfection(id) {
    editRow(id, ['address', 'city', 'province', 'postal', 'phone', 'email', 'citizen']);
}

function editSchedule(id) {
    editRow(id, ['address', 'city', 'province', 'postal', 'phone', 'email', 'citizen']);
}

function submitUpdate(id, updatableFields, href, key) {
    
    // get row id to update
    row = document.getElementById(id);
    formData = new FormData();
    formData.append(key, id);

    updatableFields.forEach(field => {
        value = row.getElementsByClassName(field)[0];
        formData.append(field, value.textContent);
    });
    formData.append('action', 'update');

    // open POST request
    request = new XMLHttpRequest()
    request.open('POST', href)
    request.send(formData);

    // reverse row to non editable
    unEditRow(id, updatableFields);

    // retrieve POST request message
    request.responseType = 'json';
    request.onload  = function() {
    var jsonResponse = request.response;

    // Alert POST request response
    alert(jsonResponse['alert']);

    // reload page
    location.reload();
    };
    
}

function is_editable(element, allowed) {
    for (var i = 0; i < element.classList.length; i++) {
        for (var j = 0; j < allowed.length; j++) {
            if (element.classList[i] === allowed[j]) {
                return true;
            }
        }
    }
    return false;
}


function editRow(id, allowedClass, href, key) {
    row = document.getElementById(id);
    row.classList.add("editable");
    cells = row.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        if (is_editable(cells[i], allowedClass)) {
            cells[i].contentEditable = true;
        }  
    }

    btn = document.getElementById('edit-' + id);
    btn.innerHTML = "Save";
    btn.classList.remove("edit-button");
    btn.classList.add("save-button");
    btn.onclick = function() {
        submitUpdate(id, allowedClass, href, key);
    };
}

function unEditRow(id, allowedClass) {
// Revert save button back to edit
btn = document.getElementById('edit-' + id);
btn.innerHTML = "Edit";
btn.classList.remove("save-button");
btn.classList.add("edit-button");

// remove editable class
row = document.getElementById(id);
row.classList.remove("editable");
cells = row.getElementsByTagName('td');

for (var i = 0; i < cells.length; i++) {
    if (is_editable(cells[i], allowedClass)) {
        cells[i].contentEditable = false;
    }  
}
}
