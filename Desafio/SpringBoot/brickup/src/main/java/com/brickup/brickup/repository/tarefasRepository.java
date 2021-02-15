package com.brickup.brickup.repository;

import java.util.List;

import com.brickup.brickup.entity.tarefas;
import org.springframework.data.jpa.repository.JpaRepository;

public interface tarefasRepository extends JpaRepository<tarefas,Integer>{

	List<tarefas> findByStatus(int status);
    
}
