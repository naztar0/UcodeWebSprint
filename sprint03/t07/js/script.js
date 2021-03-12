class Node {
    constructor(value=null) {
        this.value = value;
        this.next = null;
    }
}

class LinkedList {
    constructor() {
        this.head = null;
        this.length = 0;
    }
    add(value) {
        let node = new Node(value);
        if (this.length > 0) {
            let current = this.head;
            while(current.next)
                current = current.next;
            current.next = node;
        }
        else
            this.head = node;
        this.length++;
    }
    remove(value) {
        let current = this.head;
        if (current.value === value) {
            this.head = current.next;
            this.length--;
        }
        while(current.next) {
            if (current.next.value === value) {
                current.next = current.next.next;
                this.length--;
            }
            else
                current = current.next;
        }
    }
    contains(value) {
        let current = this.head;
        while(current) {
            if (current.value === value)
                return true;
            current = current.next;
        }
        return false;
    }
    clear() {
        this.head = null;
        this.length = 0;
    }
    count() {
        return this.length;
    }
    log() {
        let current = this.head;
        let arr = [];
        while(current) {
            arr.push(current.value);
            current = current.next;
        }
        console.log(arr.join(', '));
    }
    [Symbol.iterator]() {
        var current = this.head;
        return {
            next() {
                if (current) {
                    var value = current.value;
                    current = current.next;
                    return {value: value, done: false};
                }
                return {done: true};
            }
        };
    }
}

function createLinkedList(arr) {
    let list = new LinkedList();
    arr.forEach(element => {
        list.add(element);
    });
    return list;
}
