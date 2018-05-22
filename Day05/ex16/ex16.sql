SELECT COUNT(date) as films FROM member_history WHERE DATE(date) > DATE("2006-10-29") AND DATE(date) < DATE ("2007-07-28") OR DATE(date) LIKE "____-12-24";
