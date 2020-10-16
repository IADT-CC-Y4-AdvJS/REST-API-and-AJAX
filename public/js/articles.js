$(document).ready(function (e) {
  const API_URL = "http://localhost:8000/api/";

  function setup() {
    const user = localStorage.getItem("user");
    if (user === null) {
      $('body').removeClass('authenticated').addClass('guest');
    }
    else {
      $('body').removeClass('guest').addClass('authenticated');
    }
  }
  function login(e) {
    let user = {
      "email" : $("#login-email").val(),
      "password" : $("#login-password").val()
    };
    $.ajax({
      type: "POST",
      url: API_URL + "login",
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json"
    })
    .done(function(data, status, jqXHR) {
      localStorage.setItem("user", JSON.stringify(data.data));
      $('#modal-login').modal('hide');
      $('body').removeClass('guest').addClass('authenticated');
      load_articles();
    })
    .fail(function(jqXHR, status, error) {
      console.log(jqXHR);
      console.log(status);
      console.log(error);
    });
  }
  function logout(e) {
    let user = JSON.parse(localStorage.getItem("user"));
    $.ajax({
      type: "POST",
      url: API_URL + "logout",
      headers: {"Authorization": "Bearer " + user.api_token},
      contentType: "application/json",
      dataType: "json"
    })
    .done(function(data, status, jqXHR) {
      localStorage.removeItem("user");
      $('#modal-logout').modal('hide');
      $('body').removeClass('authenticated').addClass('guest');
      $("#table-articles tbody tr.row-article").remove();
    })
    .fail(function(jqXHR, status, error) {
      console.log(jqXHR);
      console.log(status);
      console.log(error);
    });
  }
  function load_articles() {
    let user = JSON.parse(localStorage.getItem("user"));
    $.ajax({
      type: "GET",
      url: API_URL + "articles",
      headers: {"Authorization": "Bearer " + user.api_token},
      contentType: "application/json",
      dataType: "json"
    })
    .done(function(data, status, jqXHR) {
      display_articles(data);
    })
    .fail(function(jqXHR, status, error) {
      console.log(jqXHR);
      console.log(status);
      console.log(error);
    });
  }
  function display_articles(articles) {
    let tbody = $("#table-articles tbody");
    let template = $("#template-row-article").prop("content")
    articles.forEach(function(article, index) {
      let row = template.cloneNode(true);
      $("td.cell-title", row).text(article.title);
      let intro = article.body.split(' ').slice(0,10).join(' ');
      if (article.body.length > intro.length) {
        intro = intro.concat("...");
      }
      $("td.cell-body", row).text(intro);
      tbody.append(row);
    });
  }

  setup();
  $("#login-btn").on("click", login);
  $("#logout-btn").on("click", logout);
});
