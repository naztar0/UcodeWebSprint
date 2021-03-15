let list = document.getElementById("characters").children;
for (let i = 0; i < list.length; i++) {
    let elem = list[i];
    if (elem.className !== 'good' &&
        elem.className !== 'evil' &&
        elem.className !== 'unknown')
        elem.className = 'unknown';
    if (!elem.getAttribute('data-element'))
        elem.setAttribute('data-element', 'none');
    let data_elements = elem.getAttribute('data-element').split(' ');
    for (let j = 0; j < data_elements.length; j++) {
        let circle = document.createElement('div');
        circle.className = 'elem ' + data_elements[j];
        if (data_elements[j]  === 'none') {
            let line = document.createElement('div');
            line.className = 'line';
            circle.appendChild(line);
        }
        elem.appendChild(circle);
    }
}