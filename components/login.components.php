<div class="page">
    <div class="header">
        <div class="headline">
            Odoo Login
        </div>
        <div class="subtitle">
            Bitte loggen Sie sich mit Ihren Zugangsdaten für die Odoo Instanz ein um das Inventar einzusehen.
        </div>
    </div>
    <div class="login-content">
        <form action="index.php" method="post">
            <div class="form-table">
                <div class="form-row">
                    <div class="form-label">
                        Benutzername
                    </div>
                    <input placeholder="Benutzername" type="text" name="username" />
                </div>
                <div class="form-row">
                    <div class="form-label">
                        Passwort
                    </div>
                    <input placeholder="Passwort" type="password" name="password" />
                </div>
                <div class="form-row">
                    <div class="form-label">
                        Datenbank
                    </div>
                    <input placeholder="Datenbank" type="text" name="db" />
                </div>
                <div class="form-row">
                    <div class="form-label">
                        Server
                    </div>
                    <input placeholder="Server" type="text" name="url" />
                </div>
                <div class="submit-container">
                    <input class="btn" type="submit" value="Einloggen"/>
                </div>
            </div>
        </form>
    </div>
</div>