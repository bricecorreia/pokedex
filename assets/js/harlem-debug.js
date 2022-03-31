class HarlemDebug {
    songs = [
      {
        id: "iLBBRuVDOo4",
        bpm: 126,
        offset: 2300,
      },
      {
        url: "https://youtu.be/ZWwFPvG9HYA",
        bpm: 138,
      },
    ];
    debugElements = [];
    debugSelector = ".xdebug-error";
    contentElements = [];
    contentSelector =
      "header,footer,section,h1,h2,h3,h4,h5,h6,img,a,button,label,select,input,li,table:not(.xdebug-error) td,table:not(.xdebug-error) th, table:not(.xdebug-error) tr";
    player = null;
    beatState = 1;
    constructor() {
      const contentElements = document.querySelectorAll(
        this.contentSelector,
        126
      );
      contentElements.forEach((element) => {
        const harlemElement = new HarlemDebugElement(element);
        this.contentElements.push(harlemElement);
      });
      const debugs = document.querySelectorAll(this.debugSelector);
      debugs.forEach((element) => {
        const harlemElement = new HarlemDebugElement(element, 126);
        harlemElement.poopify();
        this.debugElements.push(harlemElement);
      });
    }
    injectVideo() {
      let div = document.createElement("div");
      div.setAttribute("id", "harlem-music");
      document.body.prepend(div);
      this.player = new YT.Player("harlem-music", {
        //height: '360',
        width: "100%",
        videoId: this.songs[0].id,
        playerVars: {
          autoplay: 1,
          loop: 1,
          controls: 1,
          showinfo: 0,
          autohide: 1,
          modestbranding: 0,
        },
        events: {
          onReady: this.onPlayerReady.bind(this),
          onStateChange: this.onPlayerStateChange.bind(this),
        },
      });
    }
    onReady(event) {
      console.log("onReady");
    }
    onPlayerReady(event) {
      return;
      console.log("ready");
      document.getElementById("harlem-music").style.display = "none";
      document.addEventListener("click", () => {
        console.log("click");
        if (!this.playerStarted) {
          this.player.playVideo();
          this.playerStarted = true;
        }
      });
    }
    onPlayerStateChange(event) {
      //document.body.style.transition="all 0.1s";
      document.body.style.tranformOrigin = "50% 0";
      if (event.data === YT.PlayerState.PLAYING) {
        document.getElementById("harlem-music").style.display = "none";
        setTimeout(() => {
          this.animate();
          this.bodyBeat();
        }, this.songs[0].offset);
      }
      if (event.data === YT.PlayerState.ENDED) {
        this.player.playVideo();
      }
    }
    bodyBeat() {
      if (this.beatState > 0) {
        document.body.style.transform = "scale(0.99)";
        document.body.style.backgroundColor = "#F0F";
      } else {
        document.body.style.transform = "scale(1)";
        document.body.style.backgroundColor = "#FFF";
      }
      this.beatState *= -1;
      setTimeout(() => {
        this.bodyBeat();
      }, (60 / this.getSelectedSong().bpm) * 500);
    }
    getSelectedSong() {
      return this.songs[0];
    }
    launch() {
      window.onYouTubeIframeAPIReady = function () {
        this.injectVideo();
      }.bind(this);
      let script = document.createElement("script");
      script.setAttribute("src", "http://www.youtube.com/iframe_api");
      document.body.appendChild(script);
    }
    animate() {
      const bpm = this.songs[0].bpm;
      this.debugElements.forEach((element) => {
        element.live((60 / bpm) * 1000 * (1 + Math.trunc(Math.random())));
      });
      this.contentElements.forEach((element) => {
        element.live((60 / bpm) * 1000 * (1 + Math.trunc(Math.random())));
      });
    }
  }
  class HarlemDebugElement {
    rotationX = 0;
    rotationY = 0;
    hueRotate = 0;
    zoom = 1;
    element = null;
    interval = 0;
    timer = null;
    poopified = false;
    constructor(element, bpm) {
      this.bpm = bpm;
      this.element = element;
      this.element.style.transition = "filter 0.5s linear, transform 0.5s linear";
    }
    poopify() {
      this.poopified = true;
      this.element.querySelector("th").innerHTML =
        '<img src="https://media3.giphy.com/media/Tjw85XqqRgJzYwsI6r/giphy.gif?cid=ecf05e47a13a46259305afdc11404edebd8e45a3ee31aa53&rid=giphy.gif" style="width:0%;transition: all 1s; display:block;margin:auto"/>' +
        this.element.querySelector("th").innerHTML;
    }
    vibrate(intensity) {
      let interval = 100;
      for (let i = 0; i < 10; i++) {
        setTimeout(() => {
          let vx = Math.random() * intensity * this.randomSign();
          let vy = Math.random() * intensity * this.randomSign();
          this.element.style.marginTop = vx + "px";
          this.element.style.marginLeft = vy + "px";
        }, i * interval);
      }
    }
    randomSign() {
      if (Math.random() > 0.5) {
        return -1;
      }
      return 1;
    }
    randomRotationX(max = 180) {
      this.rotationX = Math.random() * max * this.randomSign();
    }
    randomHuRotation(max = 180) {
      this.hueRotate = Math.random() * max * this.randomSign();
    }
    randomZoom(min = 0.7, max = 1.3) {
      this.zoom = min + Math.random() * max;
    }
    live(interval) {
      if (this.poopified) {
        this.element.querySelector("th img").style.width = "100%";
      }
      this.interval = interval;
      this.timer = setInterval(() => {
        this.randomAnimation();
      }, interval);
    }
    randomAnimation() {
      this.randomRotationX();
      this.randomHuRotation();
      this.randomZoom();
      this.vibrate();
      this.apply();
    }
    apply() {
      this.element.style.transform =
        "rotate(" + this.rotationX + "deg) scale(" + this.zoom + ")";
      this.element.style.filter = "hue-rotate(" + Math.random() * 360 + "deg)";
    }
  }
  document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector(".xdebug-error")) {
      const harlemDebug = new HarlemDebug();
      harlemDebug.launch();
      console.log(harlemDebug);
    }
  });