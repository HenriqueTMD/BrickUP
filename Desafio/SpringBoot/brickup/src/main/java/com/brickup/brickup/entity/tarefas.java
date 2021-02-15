package com.brickup.brickup.entity;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.*;

@Data
@AllArgsConstructor
@NoArgsConstructor
@Entity
@Table(name = "tarefas")

public class tarefas {

    @Id
    @GeneratedValue
    private int id;
    private String titulo;
    private int status;
}