class HouseBlueprint {
    constructor(address, description, owner, size, roomCount) {
        this.address = address;
        this.description = description;
        this.owner = owner;
        this.size = size;
        this.roomCount = roomCount;
        this.date = new Date();
        this._averageBuildSpeed = 0.5;
    }
}

class HouseBuilder extends HouseBlueprint {
    getDaysToBuild() {
        return this.size / this._averageBuildSpeed;
    }
}
