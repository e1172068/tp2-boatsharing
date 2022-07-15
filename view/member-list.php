{% include "header.php" %}
    <div class="wrapper">
        <section class="section">
            <h1>Liste des membres</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Courriel</th>
                        <th>Téléphone</th>
                        <th>Nombre de réservations</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {% for member in members %} 
                        <tr>
                            <td>{{member.first_name}} {{member.last_name}}</a></td>
                            <td>{{member.email}}</td>
                            <td>{{member.phone}}</td>
                            <td>{{member.reservationCount}}</td>
                            <td>
                                <a href="{{path}}member/edit/{{member.id}}"><i class="fa-solid fa-file-pen"></i></a>
                                <a href="{{path}}member/delete/{{member.id}}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
            <a href="{{path}}member/add">Ajouter un membre</a>
        </section>
    </div>
</body>
</html>