<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="job-tracker">
        <header>
            <h1>Job Application Tracker</h1>
            <div class="header-actions">
                <button id="searchToggle" class="btn btn-icon" aria-label="Toggle search">
                    <i class="fas fa-search"></i>
                </button>
                <button id="toggleForm" class="btn btn-primary">Add New Application</button>
            </div>
        </header>
        
        <div id="searchBar" class="search-bar" style="display: none;">
            <input type="text" id="searchInput" placeholder="Search applications...">
            <button id="closeSearch" class="btn btn-icon" aria-label="Close search">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div id="jobForm" class="job-form" style="display: none;">
            <div class="form-header">
                <h2>Add New Job Application</h2>
                <button id="closeForm" class="btn btn-close">&times;</button>
            </div>
            <form>
                <div class="form-group">
                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" required>
                </div>
                <div class="form-group">
                    <label for="dateApplied">Date Applied:</label>
                    <input type="date" id="dateApplied" name="dateApplied" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="applied">Applied</option>
                        <option value="interviewing">Interviewing</option>
                        <option value="offered">Offered</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Add Application</button>
            </form>
        </div>

        <div class="job-list">
            <h2>Applied Jobs</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Company">Tech Co</td>
                            <td data-label="Position">Frontend Developer</td>
                            <td data-label="Date Applied">2023-06-01</td>
                            <td data-label="Status"><span class="status applied">Applied</span></td>
                        </tr>
                        <tr>
                            <td data-label="Company">Startup Inc</td>
                            <td data-label="Position">Full Stack Developer</td>
                            <td data-label="Date Applied">2023-05-28</td>
                            <td data-label="Status"><span class="status interviewing">Interviewing</span></td>
                        </tr>
                        <tr>
                            <td data-label="Company">Big Corp</td>
                            <td data-label="Position">Software Engineer</td>
                            <td data-label="Date Applied">2023-05-15</td>
                            <td data-label="Status"><span class="status rejected">Rejected</span></td>
                        </tr>
                        <tr>
                            <td data-label="Company">Innovate LLC</td>
                            <td data-label="Position">UX Designer</td>
                            <td data-label="Date Applied">2023-06-05</td>
                            <td data-label="Status"><span class="status offered">Offered</span></td>
                        </tr>
                        <tr>
                            <td data-label="Company">TechGiant</td>
                            <td data-label="Position">Prod Manager</td>
                            <td data-label="Date Applied">2023-05-20</td>
                            <td data-label="Status"><span class="status accepted">Accepted</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <button class="btn btn-secondary">Previous</button>
                <span>Page 1 of 3</span>
                <button class="btn btn-secondary">Next</button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('toggleForm').addEventListener('click', function() {
            var form = document.getElementById('jobForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });

        document.getElementById('closeForm').addEventListener('click', function() {
            var form = document.getElementById('jobForm');
            form.style.display = 'none';
        });

        document.getElementById('searchToggle').addEventListener('click', function() {
            var searchBar = document.getElementById('searchBar');
            searchBar.style.display = 'flex';
            document.getElementById('searchInput').focus();
        });

        document.getElementById('closeSearch').addEventListener('click', function() {
            var searchBar = document.getElementById('searchBar');
            searchBar.style.display = 'none';
        });
    </script>
</body>
</html>