# Exercices de sélection sur la base employees. 

Le schéma décrivant la base se trouve ici : https://dev.mysql.com/doc/employee/en/sakila-structure.html

Vous pouvez accéder à la base à l'adresse suivante : 
```sh
PASSWORD=pipou100f00rm47ion psql --host=asciiparait.fr --port 8131 -U courssqldebutant --dbname employes
```

## Requêtes d'interrogation simples. 
Effectuez les requêtes suivantes : 

 1. Afficher le numéro, le nom, le prénom, le genre et la date de naissance de chaque employé. ( emp_no, last_name, first_name,  gender, birth_date )

```sql 
select emp_no, last_name, first_name, gender, birth_date from employees;
```


 2. Trouver tous les employés dont le prénom est 'Troy'. ( emp_no, first_name, last_name, gender )
```sql 
select emp_no, first_name, last_name, gender from employees 
WHERE first_name like 'troy';
```


 3. Trouver tous les employés de sexe féminin ( * ).
 ```sql 
select * from employees
WHERE gender = 'F';
```


 4. Trouver tous les employés de sexe masculin nés après le 31 janvier 1965 ( * ) ?
```sql
select * from employees  
WHERE birth_date > '1965-01-31'  
order by birth_date  ASC;
``` 



 5. Lister uniquement les titres des employés, sans que les valeurs apparaissent plusieurs fois. (title) ?
 ```sql
 SELECT DISTINCT title from titles;
``` 



 6. Combien y a t'il de département ? ( nombreDep ) ?

 ```sql
SELECT COUNT(DISTINCT dept_name) AS nombreDep from departments;

``` 
 7. Qui a eu le salaire maximum de tous les temps, et quel est le montant de ce salaire ? (emp_no, maxSalary) ?
```sql
[employees]> select emp_no from employees where salary = (select max(salary) from employees);
```
```sql
[employees]> select salary as maxSalary from employees order by salary desc limit 100;
```

 8. Quel est salaire moyen de l'employé numéro 287323 toute période confondue ?  (emp_no, salaireMoy) ?
```sql
select emp_no, AVG(salary) as salaireMoy from employees where emp_no = '287323';

``` 

 9. Qui sont les employés dont le prénom fini par 'ard' (*) ?
 ```sql
 select * from employees where first_name like '%ard';

``` 

 10. Combien de personnes dont le prénom est 'Richard' sont des femmes ?
```sql
select count(first_name) as nombreDeFemmes, first_name  from employees where first_name like 'richard' and gender = 'F'
``` 


 11. Combien y a t'il de titre différents d'employés (nombreTitre) ?
```sql
SELECT COUNT(DISTINCT title) AS nombreTitre from titles;

``` 

 12. Dans combien de département différents a travaillé l'employé numéro 287323 (nombreDep) ?
 ```sql
 select count(dept_no) as nombreDep from dept_emp where emp_no = '287232';

``` 

 13. Quels sont les employés qui ont été embauchés en janvier 2000. (*) ? Les résultats doivent être ordonnés par date d'embauche chronologique
```sql
select * from employees where hire_date between '2000/01/01' and '2000/01/31';

``` 

 14. Quelle est la somme cumulée des salaires de toute la société (sommeSalaireTotale) ?

    2844047

```sql
select count(salary) as sommeSalaireTotale from employees;

``` 





## Requêtes avec jointures :
 15. Quel était le titre de Danny Rando le 12 janvier 1990 ? (emp_no, first_name, last_name, title) ?
```sql
select employees.emp_no, first_name, last_name, title from employees 
inner join titles on employees.emp_no = titles.emp_no 
where first_name like 'danny' and last_name like 'rando' 
and '1990-01-12' between titles.from_date and titles.to_date;

``` 


 16. Combien d'employés travaillaient dans le département 'Sales' le 1er Janvier 2000 (nbEmp) ?
 
 41451

 ```sql
 select *, count(emp_no) as nbEmp from departments 
 join dept_emp on departments.dept_no = dept_emp.dept_no
 where '2000/01/01' between from_date and to_date
 and dept_name like 'sales';
``` 


 18. Quelle est la somme cumulée des salaires de tous les employés dont le prénom est Richard (emp_no, first_name, last_name, sommeSalaire) ?
 ```sql
select employees.emp_no, first_name, last_name, sum(salary) as sommeSalaire from employees
join salaries on employees.emp_no = salaries.emp_no
where first_name like 'richard'
group by emp_no, first_name, last_name
order by sommeSalaire desc;

``` 



## Agrégation
 19. Indiquer pour chaque prénom 'Richard', 'Leandro', 'Lena', le nombre de chaque genre (first_name, gender, nombre). Les résultats seront ordonnés par prénom décroissant et genre.
 ```sql
select first_name , gender, count(gender)as nombre from employees
where first_name like 'leandro'
or first_name like 'richard'
or first_name like 'lena'
group by first_name, gender;


``` 

 20. Quels sont les noms de familles qui apparaissent plus de 200 fois (last_name, nombre) ? Les résultats seront triés par leur nombre croissant et le nom de famille.
```sql
select last_name, count(last_name) as nombre from employees
group by last_name
having nombre > 200
order by nombre, last_name asc;
``` 


 21. Qui sont les employés dont le prénom est Richard qui ont gagné en somme cumulée plus de 1 000 000 (emp_no, first_name, last_name, hire_date, sommeSalaire) ?
```sql
select employees.emp_no, first_name, last_name, hire_date, sum(salary) as sommeSalaire from employees
join employees on employees.emp_no = employees.emp_no 
where first_name like 'richard'
group by employees.emp_no
having sommeSalaire > 1000000;
``` 


 22. Quel est le numéro, nom, prénom  de l'employé qui a eu le salaire maximum de tous les temps, et quel est le montant de ce salaire ? (emp_no, first_name, last_name, title, maxSalary)
 ```sql
select employees.emp_no, employees.first_name, employees.last_name, titles.title, salary as maxSalary from employees
join employees on employees.emp_no = employees.emp_no
join titles on employees.emp_no = titles.emp_no
order by salary desc limit 10;
```

bonus. Qui est le manager de Martine Hambrick actuellement et quel est son titre (emp_no, first_name, last_name, title)
```sql 
select employees.emp_no, first_name, last_name, title from employees
join titles on employees.emp_no = titles.emp_no
where employees.emp_no = (
    select emp_no from dept_manager 
        WHERE dept_no = (
            select dept_no from current_dept_emp
            where emp_no = (
                select emp_no from employees
                where first_name like 'Martine' 
                and last_name like 'H%mbrick')

            )
        AND (select now()) BETWEEN from_date and to_date

) and titles.title like 'manager';
```

## La suite : 
 23. Quel est actuellement le salaire moyen de chaque titre  (title, salaireMoyen) ? Classé par salaireMoyen croissant
```sql
select titles.title, avg(salaries.salary) as avg_salary from salaries
join titles on salaries.emp_no = titles.emp_no
group by titles.title;

``` 


 24. Combien de manager différents ont eu les différents départements (dept_no, dept_name, nbManagers), Classé par nom de département

```sql

select dept_manager.dept_no, dept_name, count(dept_manager.emp_no) as nbManagers from dept_manager
join departments on dept_manager.dept_no = departments.dept_no
group by dept_manager.dept_no
order by dept_name;
```

 25. Quel est le département de la société qui a le salaire moyen le plus élevé (dept_no, dept_name, salaireMoyen)

```sql
select dept_emp.dept_no, dept_name, avg(salary) as salaireMoyen from dept_emp join departments on dept_emp.dept_no = departments.dept_no join salaries on dept_emp.emp_no = salaries.emp_no  group by dept_emp.dept_no having salaireMoyen order by salaireMoyen desc limit 1;

``` 

 26. Quels sont les employés qui ont eu le titre de 'Senior Staff' sans avoir le titre de 'Staff' ( emp_no , birth_date , first_name , last_name , gender , hire_date )
```sql
select employees.emp_no, title, employees.birth_date, employees.first_name, employees.last_name, employees.gender, employees.hire_date FROM employees
join titles on employees.emp_no = titles.emp_no
where title like 'Senior Staff' 
and titles.emp_no not in (
    select emp_no from titles 
    where title like 'staff');
``` 


 27. Indiquer le titre et le salaire de chaque employé lors de leur embauche (emp_no, first_name, last_name, title, salary)
```sql
select employees.emp_no, employees.first_name, employees.last_name, titles.title, salaries.salary, employees.hire_date, salaries.from_date, salaries.to_date from employees

join salaries on employees.emp_no = salaries.emp_no
join titles on employees.emp_no = titles.emp_no

where employees.hire_date between salaries.from_date and salaries.to_date
group by employees.emp_no;

``` 
150291 rows in set (10.593 sec)


```sql
select employees.emp_no, employees.first_name, employees.last_name, titles.title, salaries.salary from employees

join salaries on employees.emp_no = salaries.emp_no
join titles on employees.emp_no = titles.emp_no

where employees.hire_date between salaries.from_date and salaries.to_date
group by employees.first_name, employees.last_name;
```
144994 rows in set (13.265 sec)

 28. Quels sont les employés dont le salaire a baissé (emp_no, first_name, last_name)
```sql


``` 
