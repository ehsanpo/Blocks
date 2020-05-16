document.addEventListener("DOMContentLoaded", function () {
  var checkbox = document.querySelector("input[name=mode]");
  if (typeof checkbox != "undefined" && checkbox != null) {
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        trans();
        document.documentElement.setAttribute("data-theme", "dark");
        svg_color_change("#000");
      } else {
        trans();
        document.documentElement.setAttribute("data-theme", "light");
        svg_color_change("#fff");
      }
    });

    let trans = () => {
      document.documentElement.classList.add("transition");
      window.setTimeout(() => {
        document.documentElement.classList.remove("transition");
      }, 1000);
    };
    let svg_color_change = (color) => {
      //alternative change class or change image
      let brand_logo_svg = document.getElementsByClassName("brand-logo-svg");
      for (let index = 0; index < brand_logo_svg.length; index++) {
        brand_logo_svg[index].style.fill = color;
      }
    };
  }
});
