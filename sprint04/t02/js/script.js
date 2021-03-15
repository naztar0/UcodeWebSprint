let placeholder = document.getElementById("placeholder");
placeholder.innerHTML = '';
let table = document.createElement('table');
let thead = document.createElement('thead');
let tbody = document.createElement('tbody');
let th1 = document.createElement('th');
let th2 = document.createElement('th');
let th3 = document.createElement('th');
let tableParams = ["Name", "Strength", "Age"];
th1.innerHTML = tableParams[0];
th2.innerHTML = tableParams[1];
th3.innerHTML = tableParams[2];
thead.appendChild(th1);
thead.appendChild(th2);
thead.appendChild(th3);
table.appendChild(thead);
table.appendChild(tbody);
placeholder.appendChild(table);

let content = [["Black Panther", 66, 53], ["Captain America", 79, 137], ["Captain Marvel", 97, 26], ["Hulk", 80, 49],
               ["Iron Man", 88, 48], ["Spider- Man", 78, 16], ["Thanos", 99, 1000], ["Thor", 95, 1000], ["Yon- Rogg", 73, 52]];

function fill(cont) {
    tbody.innerHTML = '';
    for (let i = 0; i < cont.length; i++) {
        let tr = document.createElement('tr');
        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let namesp = cont[i][0].split(' ');
        let name = '';
        for (let j = 0; j < namesp.length; j++)
            name += namesp[j] + "<br>";
        td1.innerHTML = name;
        td2.innerHTML = cont[i][1];
        td3.innerHTML = cont[i][2];
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tbody.appendChild(tr);
    }
}
fill(content);

// Sorting
let notification = document.getElementById("notification");
let ascending = true;
function sortTable(paramNum) {
    let sorted = content.sort((a, b) => {
        if (typeof a[paramNum] == 'string') {
            if (a[paramNum] <  b[paramNum]) return ascending ? 1 : -1;
            else if (a[paramNum] >  b[paramNum]) return !ascending ? 1 : -1;
            return 0;
        }
        return ascending ? b[paramNum] - a[paramNum] : a[paramNum] - b[paramNum];
    });
    ascending = !ascending;
    fill(sorted);
    notification.innerHTML = `Sorting by ${tableParams[paramNum]}, order: ${ascending ? 'ASC' : 'DESC'}`;
}
th1.onclick = () => sortTable(0);
th2.onclick = () => sortTable(1);
th3.onclick = () => sortTable(2);
