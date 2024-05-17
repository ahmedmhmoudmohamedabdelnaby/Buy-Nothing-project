<!DOCTYPE html>
<html>
<head>
<body>

  <div id="report-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Report</h2>
      <form>
        <div>
          <input type="radio" id="report-post" name="report-option" value="post" checked>
          <label for="report-post">Report this user</label>
        </div>
        <div>
          <input type="radio" id="report-user" name="report-option" value="user">
          <label for="report-user">Report this post</label>
        </div>
        <div>
          <label for="report-details">Reported user email:</label>
          <textarea id="report-details" name="report-details"></textarea>
        </div>
        <div>
          <label for="report-details">the reason of the report:</label>
          <textarea id="report-details" name="report-details"></textarea>
        </div>
        <button>Submit</button>
      </form>
    </div>
  </div>

</body>
</html>
