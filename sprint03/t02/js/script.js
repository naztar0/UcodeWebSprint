class Timer {
    constructor(title, delay, stopCount) {
        this.title = title;
        this.delay = delay;
        this.stopCount = stopCount;
        this.timerId = 0;
    }
    start() {
        console.log(`Timer Bleep started (delay=${this.delay}, stopCount=${this.stopCount})`);
        this.timerId = setInterval(this.tick.bind(this), this.delay);
    }
    tick() {
        console.log(`Timer Bleep Tick! | cycles left ${this.stopCount--}`);
        if (this.stopCount == -1)
            this.stop();
    }
    stop() {
        console.log("Timer Bleep stopped");
        clearInterval(this.timerId);
    }
}

function runTimer(id, delay, counter) {
    const timer = new Timer(id, delay, counter);
    timer.start();
}
