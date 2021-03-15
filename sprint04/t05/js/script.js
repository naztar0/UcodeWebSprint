let colors = ["#fdfd93", "#9292ff", "#d461d4", "#48da48", "#f36262", "red"];
let stones = document.getElementsByClassName("stone");
for (let i = 0; i < stones.length; i++) {
    let stone = stones[i];
    stone.style.backgroundColor = colors[i];
    stone.onclick = () => {
        if (stone.className.split(' ')[1] === "on") {
            stone.className = "stone off";
        }
        else {
            stone.className = "stone on";
        }
    }
    let isDown = false;
    stone.addEventListener('mousedown', function(e) {
        isDown = true;
        offset = [
            stone.offsetLeft - e.clientX,
            stone.offsetTop - e.clientY
        ];
    }, true);
    document.addEventListener('mouseup', function() {
        isDown = false;
    }, true);
    document.addEventListener('mousemove', function(event) {
        event.preventDefault();
        if (isDown) {
            mousePosition = {
                x: event.clientX,
                y: event.clientY
            };
            if (stone.className.split(' ')[1] === 'on') {
                stone.style.position = "absolute";
                stone.style.left = (mousePosition.x + offset[0]) + 'px';
                stone.style.top  = (mousePosition.y + offset[1]) + 'px';
            }
        }
    }, true);
}